<?php

namespace Dsc\Http\Controllers\Api\Profile;

use Illuminate\Http\Request;
use Dsc\Events\User\ChangedAvatar;
use Dsc\Http\Controllers\Api\ApiController;
use Dsc\Http\Requests\User\UploadAvatarRawRequest;
use Dsc\Repositories\User\UserRepository;
use Dsc\Services\Upload\UserAvatarManager;
use Dsc\Transformers\UserTransformer;

/**
 * Class DetailsController
 * @package Dsc\Http\Controllers\Api\Profile
 */
class AvatarController extends ApiController
{
    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var UserAvatarManager
     */
    private $avatarManager;

    public function __construct(UserRepository $users, UserAvatarManager $avatarManager)
    {
        $this->middleware('auth');

        $this->users = $users;
        $this->avatarManager = $avatarManager;
    }

    public function update(UploadAvatarRawRequest $request)
    {
        $name = $this->avatarManager->uploadAndCropAvatar(
            auth()->user(),
            $request->file('file')
        );

        $user = $this->users->update(
            auth()->id(),
            ['avatar' => $name]
        );

        event(new ChangedAvatar);

        return $this->respondWithItem($user, new UserTransformer);
    }

    public function updateExternal(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|url'
        ]);

        $this->avatarManager->deleteAvatarIfUploaded(
            auth()->user()
        );

        $user = $this->users->update(
            auth()->id(),
            ['avatar' => $request->url]
        );

        event(new ChangedAvatar);

        return $this->respondWithItem($user, new UserTransformer);
    }

    /**
     * Remove avatar for currently authenticated user and set it to null.
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy()
    {
        $user = auth()->user();

        $this->avatarManager->deleteAvatarIfUploaded($user);

        $user = $this->users->update(
            $user->id,
            ['avatar' => null]
        );

        event(new ChangedAvatar);

        return $this->respondWithItem($user, new UserTransformer);
    }
}
