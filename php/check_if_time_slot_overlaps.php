<?php

/*
 * This function assumes that the given set of time slots are of the same day as of 
 * the time slot to check. If not, we may need to add the date too before checking
 */

function is_slot_available( $calendar, $request )
{
    foreach ($calendar as $value) {

        // wp_die(json_encode($value));

        if (strtotime($request['starts_at']) == strtotime($value['starts_at'])) {
            // Both start time is equal
            return false;
        }

        if (strtotime($request['not_available_till']) == strtotime($value['not_available_till'])) {
            // Both end time is equal
            return false;
        }

        if (strtotime($request['starts_at']) > strtotime($value['starts_at']) &&
            strtotime($request['starts_at']) < strtotime($value['not_available_till'])) {
            // Given start time is in between start & end time
            return false;
        }

        if (strtotime($request['not_available_till']) > strtotime($value['starts_at']) &&
            strtotime($request['not_available_till']) < strtotime($value['not_available_till'])) {
            // Given end time is in between start & end time
            return false;
        }

        if (strtotime($request['starts_at']) < strtotime($value['starts_at']) &&
            strtotime($request['not_available_till']) > strtotime($value['not_available_till'])) {
            // Given time completely taken over (swallowed) the existing time
            return false;
        }

    }

    return true;
}
