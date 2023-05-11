<?php

namespace App\Traits;

trait PermissionTrait
{
    public $allPermission = false, $permissionList = [], $groupList = [], $permissions = [];

    public function setSinglePermission($permission_id, $permission_name)
    {
        if(!in_array($permission_id, $this->permissionList))
        {
            $this->permissionList[$permission_name] = $permission_id;
        }
        else
        {
            unset($this->permissionList[$permission_name]);
        }
        $this->checkGroupPermission($this->permissionList);
        $this->checkAllPermission($this->permissionList);
    }

    public function setAllPermission()
    {
        $this->allPermission = true;
        foreach($this->permissions as $key => $permission)
        {
            if(!in_array($permission->group_name, $this->groupList))
            {
                $this->groupList[$permission->group_name] = $permission->group_name;
            }
            $this->permissionList[$permission->name] = $permission->id;
        }
    }

    public function unsetAllPermission()
    {
        $this->allPermission = false;
        $this->permissionList = [];
        $this->groupList = [];
    }

    public function checkAllPermission($permissions)
    {
        if(count($this->permissions) === count($permissions))
        {
            $this->allPermission = true;
        }
        else
        {
            $this->allPermission = false;
        }
    }

    public function setAllGroupPermission($group_name)
    {
        $groups = $this->permissions->groupBy('group_name');
        $groups = $groups[$group_name];
        foreach ($groups as $permission)
        {
            if(!in_array($permission->id, $this->permissionList))
            {
                $this->permissionList[$permission->name] = $permission->id;
            }
        }
        $this->groupList[$group_name] = $group_name;
        $this->checkAllPermission($this->permissionList);
    }

    public function unsetAllGroupPermission($group_name)
    {
        $groups = $this->permissions->groupBy('group_name');
        $groups = $groups[$group_name];
        foreach ($groups as $permission)
        {
            if(in_array($permission->id, $this->permissionList))
            {
                unset($this->permissionList[$permission->name]);
            }
        }
        unset($this->groupList[$group_name]);
        $this->checkAllPermission($this->permissionList);
    }

    public function checkGroupPermission($permissions)
    {
        $group_permissions = $this->permissions->groupBy('group_name');
        foreach ($group_permissions as $key => $group_permission)
        {
            $permission_names = $group_permission->pluck('id', 'name')->toArray();
            $result = array_intersect($permission_names, $permissions);

            if(count($result) === count($permission_names))
            {
                $this->groupList[$key] = $key;
            }
            else
            {
                if(in_array($key, $this->groupList))
                {
                    unset($this->groupList[$key]);
                }
            }
        }
    }
}
