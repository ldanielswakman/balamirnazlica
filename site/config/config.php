<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

c::set('cache', false);

/*

---------------------------------------
Panel Widgets
---------------------------------------

*/

c::set('panel.widgets', array(
  'account'  => true,
  'history'  => true,
  'pages'    => false,
  'page-list'=> true,
  'site'     => false,
));


/*

---------------------------------------
Routes
---------------------------------------

Contact form Routing

*/
c::set('routes', [
  [
    'pattern' => 'contactform_post',
    'method' => 'POST',
    'action'  => function() {
    
      $form = new \Uniform\Form([
        'name' => [],
        'email' => [
          'rules' => ['required', 'email'],
          'message' => 'Please enter a valid email address',
        ],
        'subject' => [],
        'message' => [
          'rules' => ['required'],
          'message' => 'Please enter a message',
        ],
      ]);

      // Perform validation and execute guards.
      $form->withoutFlashing()
        ->withoutRedirect()
        ->guard();

      $code = 200;

      if (!$form->success()) { 

        $code = 400;

      } else {
        // If validation and guards passed, execute the action.
        $form->emailAction([
          'to' => 'd.swakman@gmail.com',
          'from' => 'website@balamirnazlica.com',
          'replyTo' => $form->data('email'),
          'subject' => $form->data('subject')
        ])
        ->logAction([
          'file' => kirby()->roots()->site() . '/email.log',
        ]);

        if (!$form->success()) { $code = 500; }

      }

      // Return code 200 on success.
      return response::json(['success' => $form->success(), 'errors' => $form->errors(), 'code' => $code]);
    }
  ]
]);

