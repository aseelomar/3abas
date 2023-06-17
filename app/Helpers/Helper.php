<?php


if ( ! function_exists( 'unique_random' ) )
{
    /**
     *
     * Generate a unique random string of characters
     *
     * @param     $table - name of the table
     * @param     $col - name of the column that needs to be tested
     * @param int $chars - length of the random string
     * @param int $prefix - prefix
     * @param string $group - prefix
     *
     * @return string
     */
    function unique_random( $table, $col, int $chars = 5, $prefix = null, $group = '0123456789' ): string
    {

        $unique = false;

        // Store tested results in array to not test them again
        $tested = [];

        do
        {

            $permitted_chars = $group;
            $random          = substr( str_shuffle( $permitted_chars ), 0, $chars );

            // Check if it's already testing
            // If so, don't query the database again
            if ( in_array( $random, $tested ) )
            {
                continue;
            }

            // Check if it is unique in the database
            $count = DB::table( $table )->where( $col, '=', $prefix . $random )->count();

            // Store the random character in the tested array
            // To keep track which ones are already tested
            $tested[] = $random;

            // String appears to be unique
            if ( $count == 0 )
            {
                // Set unique to true to break the loop
                $unique = true;
            }

            // If unique is still false at this point
            // it will just repeat all the steps until
            // it has generated a random string of characters

        } while ( ! $unique );

        return $random;
    }

}
