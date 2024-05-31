<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Record;
use Illuminate\Http\Request;

class CheckRecordOwnership
{
/**
* Handle an incoming request.
*
* @param \Illuminate\Http\Request $request
* @param \Closure $next
* @return mixed
*/
public function handle(Request $request, Closure $next)
{
$recordId = $request->route('id'); // Get the record ID from the route
$record = Record::find($recordId);

// Check if the record exists and belongs to the current user
if (!$record || $record->user_id != auth()->id()) {
return response()->json(['message' => 'Unauthorized access or record not found'], 403);
}

return $next($request);
}
}