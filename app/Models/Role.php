<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 *
 * @property-read User|HasMany $user
 */
class Role extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'roles';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name'
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Role
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

}
