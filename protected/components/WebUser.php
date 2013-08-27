<?php

class WebUser extends CWebUser
{
    /**
     * Overrides a Yii method that is used for roles in controllers (accessRules).
     *
     * @param string $operation Name of the operation required (here, a role).
     * @param mixed $params (opt) Parameters for this operation, usually the object to access.
     * @return bool Permission granted?
     *
     * http://www.yiiframework.com/wiki/328/simple-rbac/
     */
    public function checkAccess($operation, $params=array())
    {
        if (empty($this->id)) {
            // Not identified => no rights
            return false;
        }
        $role = $this->getState("role");
        if ($role === 'admin') {
            return true; // admin role has access to everything
        }
        // allow access if the operation request is the current user's role
        return ($operation === $role);
    }

    private function matchRole($roleToMatch)
    {
        if (empty($this->id)) {
            // Not identified => no rights
            return false;
        }
        $role = $this->getState("role");
        if (isset($role) && $role==$roleToMatch)
            return true;
        return false;
    }

    function isAdmin (){
        return $this->matchRole('admin');
    }

    function isMedico(){
        return $this->matchRole('medico');
    }

}