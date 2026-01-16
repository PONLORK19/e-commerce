<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Task $task): bool
    {
        // Admin → everything
        if ($user->hasRole('admin')) return true;

        // Manager → tasks in their projects
        if ($user->hasRole('manager')) {
            return $task->project->created_by === $user->id;
        }

        // Staff → only assigned tasks
        if ($user->hasRole('staff')) {
            return $task->assigned_to === $user->id;
        }

        return false;
    }
    public function updateStatus(User $user, Task $task): bool
    {
        // Only assigned staff can update status
        return $user->hasRole('staff') &&
               $task->assigned_to === $user->id;
    }
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Task $task): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Task $task): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Task $task): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Task $task): bool
    {
        return false;
    }
}
