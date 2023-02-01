<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_info()
    {
        return $this->hasOne(UserInfo::class);
    }
    public function role()
    {
        return $this->hasOne(Role::class)->with('profil');
    }
    public function universite()
    {
        return $this->hasOne(Universite::class);
    }
    public function eleve()
    {
        return $this->hasOne(Eleve::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function getProfilNameAttribute() {
        if($this->is_admin) {
            return "Sup'Administrateur";
        }
        return $this->role->profil->name ?? "Non défini";
    }

    public function getNomCompletAttribute() {
        return $this->fname .' ' . $this->name;
    }
    public function getRoleNotDefinedAttribute(){
        $roles = $this->roles;
        $profil_ids  = [];
        foreach ($roles as $role) {
            array_push($profil_ids, $role->profil_id);
        }
        $profils = Profil::whereNotIn('id',$profil_ids)->get();
        return $profils;
    }

    public function getPhotoAttribute() {
        if(isset($this->collaborateur) && isset($this->collaborateur->photo)) {
            return env("CENTRALISATION_LINK", "https://total-workspace-sn.com/") . $this->collaborateur->photo;
        }
        return null;
    }

    public function getIsSuperAdminAttribute(){

        return $this->is_admin;
    }

    public function getIsProfilAdminAttribute(){

        return $this->role && $this->role->profil_id == 1;
    }

    public function getIsProfilGestionnaireAttribute(){

        return $this->role && $this->role->profil_id == 2;
    }

    public function getIsProfilConsultantAttribute(){

        return $this->role && $this->role->profil_id == 3;
    }
    static function createOrUpdateRole($user_id, $profil_id = 1)
    {
        $role = Role::where('user_id', $user_id)->first();

        if($role) {
            return $role->update(['profil_id' => $profil_id]);
        }
        return Role::create([
            'user_id' => $user_id,
            "profil_id" => $profil_id,
            "statut" => 1
        ]);
    }

    //relation with bloc
    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
