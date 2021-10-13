<?php

/*
  ROUTES
  ----
  https://getkirby.com/docs/reference/plugins/extensions/routes
*/
   
return function ($kirby) {
  return [
    
    // CREATE KIRBY USER ---------------------------------------------------------------------------------------
    [
      // PATTERN => BENCHMARK / CREATE / USER / X
      'pattern' => 'benchmark/create/user/(:num)',
      'action' => function ($num) {

        $kirby = kirby();
        $kirby->impersonate('kirby');

        // KILL ALL USERS MANUALLY
        /* => logicException: The last user cannot be deleted */

        // START WITH HIGHEST CANDIDATE
        $count = ($kirby->users()->count()===0) ? 1 : $kirby->users()->count()+1;
        $loop = $count + $num;

        // START TIMER
        $start = microtime(true);

        try {

          for ($i = $count; $i<$loop; ++$i) {

            // CREATE USER
            $user = $kirby->users()->create([
              'email'     => $i . '@domain.tld',
              'password'  => '12345678'   
            ]);

            // UPDATE USER
            $user->update([
              'candidate' => $i
            ]);
          }

          $kirby->impersonate(); 

        } catch(Exception $e) {

          return 'The user could not be created: ' . $e->getMessage();

        }  

        $stop = microtime(true);
        $tto = $stop - $start;

        // Convert
        $hours = (int)($tto/60/60);
        $minutes = (int)($tto/60)-$hours*60;
        $seconds = (int)$tto-$hours*60*60-$minutes*60;

        return [
          'TTO' => [
            'Microtime'   => $tto,
            'Hours'       => $hours,
            'Minutes'     => $minutes,
            'Seconds'     => $seconds
          ]
        ];
      }
    ],
    // SEARCH KIRBY USER BY EMAIL ---------------------------------------------------------------------------------------
    [
      // PATTERN => BENCHMARK / SEARCH / USER / EMAIL / X
      'pattern' => 'benchmark/search/user/email/(:any)',
      'action' => function ($email) {

        // START TIMER
        $start = microtime(true);

        $user = kirby()->user($email);

        $stop = microtime(true);
        $tto = $stop - $start;

        // Convert
        $hours = (int)($tto/60/60);
        $minutes = (int)($tto/60)-$hours*60;
        $seconds = (int)$tto-$hours*60*60-$minutes*60;

        return [
          'TTO' => [
            'Microtime'   => $tto,
            'Hours'       => $hours,
            'Minutes'     => $minutes,
            'Seconds'     => $seconds
          ],
          'User' => [
            'Email' => $user ? $user->email() : 'NA',
            'Candidate' => $user ? $user->candidate()->toString() : 'NA'
          ]
        ];
      }
    ],
    // SEARCH KIRBY USER BY ATTRIBUTE ----------------------------------------------------------------------------------
    [
      // PATTERN => BENCHMARK / SEARCH / USER / CANDIDATE/ X
      'pattern' => 'benchmark/search/user/candidate/(:num)',
      'action' => function ($candidate) {

        // START TIMER
        $start = microtime(true);

        $user = kirby()->users()->findBy('Candidate', $candidate);

        $stop = microtime(true);
        $tto = $stop - $start;

        // Convert
        $hours = (int)($tto/60/60);
        $minutes = (int)($tto/60)-$hours*60;
        $seconds = (int)$tto-$hours*60*60-$minutes*60;

        return [
          'TTO' => [
            'Microtime'   => $tto,
            'Hours'       => $hours,
            'Minutes'     => $minutes,
            'Seconds'     => $seconds
          ],
          'User' => [
            'Email' => $user ? $user->email() : 'NA',
            'Candidate' => $user ? $user->candidate()->toString() : 'NA'
          ]
        ];
      }
    ],
  ];
};

