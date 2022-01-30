<?php

namespace App\Policies;

use \Illuminate\Auth\Access\Response;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Thing;
use App\Models\User;

class ThingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Thing  $thing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Thing $thing)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $role = Role::where('name', 'admin')->value('id');
        if ($user->role_id == $role) return Response::deny('Нет доступа');
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Thing  $thing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Thing $thing)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Thing  $thing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Thing $thing)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Thing  $thing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Thing $thing)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Thing  $thing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Thing $thing)
    {
        //
    }
}
