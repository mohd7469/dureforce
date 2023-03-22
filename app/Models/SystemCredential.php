<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemCredential extends Model
{
    use HasFactory, SoftDeletes;
    public const Type_Redis = "redis";
    public const Type_Pusher = "pusher";
    public const Type_Storage = "storage";
    protected $fillable = ['name','host','password','port','database','prefix','client','type','is_active'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = app(Encrypter::class)->encrypt($value);
    }
    public function setHostAttribute($value)
    {
        $this->attributes['host'] = app(Encrypter::class)->encrypt($value);
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = app(Encrypter::class)->encrypt($value);
    }
    public function setPortAttribute($value)
    {
        $this->attributes['port'] = app(Encrypter::class)->encrypt($value);
    }
    public function setDatabaseAttribute($value)
    {
        $this->attributes['database'] = app(Encrypter::class)->encrypt($value);
    }
    public function setPrefixAttribute($value)
    {
        $this->attributes['prefix'] = app(Encrypter::class)->encrypt($value);
    }
    public function setClientAttribute($value)
    {
        $this->attributes['client'] = app(Encrypter::class)->encrypt($value);
    }

    public function getNameAttribute($value)
    {
        try {
            return app(Encrypter::class)->decrypt($this->attributes['name']);
        } catch (DecryptException $e) {
            return null;
        }
    }
    public function getHostAttribute($value)
    {
        try {
            return app(Encrypter::class)->decrypt($this->attributes['host']);
        } catch (DecryptException $e) {
            return null;
        }
    }
    public function getPasswordAttribute($value)
    {
        try {
            return app(Encrypter::class)->decrypt($this->attributes['password']);
        } catch (DecryptException $e) {
            return null;
        }
    }
    public function getPortAttribute($value)
    {
        try {
            return app(Encrypter::class)->decrypt($this->attributes['port']);
        } catch (DecryptException $e) {
            return null;
        }
    }
    public function getDatabaseAttribute($value)
    {
        try {
            return app(Encrypter::class)->decrypt($this->attributes['database']);
        } catch (DecryptException $e) {
            return null;
        }
    }
    public function getPrefixAttribute($value)
    {
        try {
            return app(Encrypter::class)->decrypt($this->attributes['prefix']);
        } catch (DecryptException $e) {
            return null;
        }
    }
    public function getClientAttribute($value)
    {
        try {
            return app(Encrypter::class)->decrypt($this->attributes['client']);
        } catch (DecryptException $e) {
            return null;
        }
    }
}
