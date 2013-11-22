<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
        $users = Usuario::model()->find(array(
            'condition' => 'usuario=:usuario',
            'params' => array(':usuario' => $this->username),
                )
        );
        
        $roles = Roles::model()->findAll(array(
            
            'select'=> 'nombre_rol',
            
        ));
        
        
       $perfiles = array();
        
        foreach ($roles as $rol) {
        
     
          $roles_= $rol->nombre_rol;
          $perfiles[] = $roles_;

        }
        
        $this->setState('roles', $perfiles);
        
       
        
        if ($users==null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        elseif (crypt($this->password,$users->contrasena)!= $users->contrasena)
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else
            $this->errorCode = self::ERROR_NONE;
        return !$this->errorCode;
    }
}