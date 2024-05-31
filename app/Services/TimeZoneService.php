<?php

namespace App\Services;

use App\Models\Record;
use Carbon\Carbon;
use Torann\GeoIP\Facades\GeoIP;
use Illuminate\Http\Request;
use Auth;

class TimeZoneService
{
    /**
     * Process records with timezone conversion.
     *
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function processRecordsWithTimezone(Request $request, $records)
    {

        $timezone = $request->input('timezone', $this->getServerSideTimezone($request->ip()));

         if (!$this->isValidTimezone($timezone)) {
            $timezone = Auth::user()->timezone ?: 'UTC';  // Fallback to user's preferred timezone or UTC
        }

        $records = $records->map(function ($record) use ($timezone) {
            // Convert the created_at to the requested timezone
            $record->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $record->created_at, 'UTC')
                                        ->timezone($timezone);
            return $record;
        });

        return $records;
    }

    /**
     * Validate if a given timezone is valid.
     *
     * @param string|null $timezone
     * @return bool
     */
    protected function isValidTimezone($timezone)
    {
        return in_array($timezone, timezone_identifiers_list());
    }

    /**
     * Attempt to detect timezone based on the client's IP address.
     * Placeholder for GeoIP or similar service.
     *
     * @param string $ip
     * @return string|null
     */
 protected function getServerSideTimezone($ip)
{
    try {
         $userIp = request()->ip();  // or a specific IP for testing
         $location = GeoIP::getLocation(request()->ip)->timezone;

         return $location;
    } catch (\Exception $e) {

        return null;
    }
}
}