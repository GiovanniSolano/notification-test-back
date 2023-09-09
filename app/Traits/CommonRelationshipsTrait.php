<?

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait CommonRelationshipsTrait
{
    public function activityLog(): HasMany
    {
        return $this->hasMany(ActivityLog::class);
    }
}
