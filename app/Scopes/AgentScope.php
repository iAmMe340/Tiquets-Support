<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AgentScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $user = auth()->user();
        if(auth()->check() && request()->is('admin/*') && $user->roles->contains(1))
        {
            $builder->where('category_id', $user->category_id);
        }
        elseif(auth()->check() && request()->is('admin/*') && $user->roles->contains(2))
        {
            $builder->where('assigned_to_user_id', $user->id);
        }
        elseif(auth()->check() && request()->is('admin/*') && $user->roles->contains(3))
        {
            $builder->where('author_name', $user->name);
        }
    }
}