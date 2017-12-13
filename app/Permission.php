<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'identify',
        'group',
        'description',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }

    /**
     * Pega os grupos das permissoes sem repeticao
     *
     * @return mixed
     */
    public static function getGroupsOfPermissions()
    {
        // distinct pra pegar apenas o campo grupo sem repeticao ordenado alfabeticamente
        return self::distinct()->orderBy('group')->get(['group']);
    }
}
