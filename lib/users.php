<?php





// create admin account




// $users = [
//   [
//     // admin, employee, client
//     'id' => 0,
//     'last_name' => 'DOE',
//     'first_name' => 'John',
//     'function' => 'admin',

//     // admin, employee
//     'email' => 'john.doe@parrot-auto.com',
//     'password' => '1234',

//     //client
//     //for contact : + mail + first_name + last_name
//     'phone' => '0123456789',
//     'message_content' => 'lorem ipsum dolor',
//     //for comment : name
//     'comment_content' => 'lorem ipsum dolor',
//     'note' => 5
//   ]
// ];



// $users = [
//     [
//         'id' => 0,
//         'last_name' => 'DOE',
//         'first_name' => 'John',
//         'function' => 'admin',
//         'email' => 'john.doe@example.com',
//         'password' => 'password123'
//     ],
//     [
//         'id' => 1,
//         'last_name' => 'SMITH',
//         'first_name' => 'Jane',
//         'function' => 'employee',
//         'email' => 'jane.smith@example.com',
//         'password' => 'secret456'
//     ],
//     [
//         'id' => 2,
//         'last_name' => 'WILLIAMS',
//         'first_name' => 'David',
//         'function' => 'employee',
//         'email' => 'david.williams@example.com',
//         'password' => 'qwerty789'
//     ],
//     [
//         'id' => 3,
//         'last_name' => 'JOHNSON',
//         'first_name' => 'Michael',
//         'function' => 'employee',
//         'email' => 'michael.johnson@example.com',
//         'password' => 'pass1234'
//     ],
//     [
//         'id' => 4,
//         'last_name' => 'BROWN',
//         'first_name' => 'Jennifer',
//         'function' => 'employee',
//         'email' => 'jennifer.brown@example.com',
//         'password' => 'password567'
//     ],
//     [
//         'id' => 5,
//         'last_name' => 'JONES',
//         'first_name' => 'Christopher',
//         'function' => 'employee',
//         'email' => 'christopher.jones@example.com',
//         'password' => 'secret789'
//     ],
//     [
//         'id' => 6,
//         'last_name' => 'DAVIS',
//         'first_name' => 'Jessica',
//         'function' => 'employee',
//         'email' => 'jessica.davis@example.com',
//         'password' => 'qwerty123'
//     ],
//     [
//         'id' => 7,
//         'last_name' => 'MILLER',
//         'first_name' => 'Andrew',
//         'function' => 'employee',
//         'email' => 'andrew.miller@example.com',
//         'password' => 'pass7890'
//     ],
//     [
//         'id' => 8,
//         'last_name' => 'WILSON',
//         'first_name' => 'Emily',
//         'function' => 'employee',
//         'email' => 'emily.wilson@example.com',
//         'password' => 'password890'
//     ],
//     [
//         'id' => 9,
//         'last_name' => 'TAYLOR',
//         'first_name' => 'Daniel',
//         'function' => 'employee',
//         'email' => 'daniel.taylor@example.com',
//         'password' => 'secret123'
//     ]
// ];




// $users = [
//     'admin' => [
//         'id' => 9,
//         'last_name' => 'TAYLOR',
//         'first_name' => 'Daniel',
//         'function' => 'admin',
//         'email' => 'daniel.taylor@example.com',
//         'password' => 'secret123'
//     ],
//     'employee' => [
//         'id' => 9,
//         'last_name' => 'TAYLOR',
//         'first_name' => 'Daniel',
//         'function' => 'employee',
//         'email' => 'daniel.taylor@example.com',
//         'password' => 'secret123'
//     ],
//     'client' => [
//         [
//             'id' => 9,
//             'last_name' => 'TAYLOR',
//             'first_name' => 'Daniel',
//             'function' => 'client',
//             'email' => 'daniel.taylor@example.com',
//             'messages' => [
//                 'title' => 'bonjour',
//                 'content' => 'lorem ipsum'
//             ], 
//             'note' => [
//                 'note' => 4,
//                 'comment' => 'lorem ipsum'
//             ]
//         ]
//     ]
// ];






$users = [
    'admin' => [
        'id' => 1,
        'last_name' => 'TAYLOR',
        'first_name' => 'Daniel',
        'function' => 'admin',
        'email' => 'daniel.taylor@example.com',
        'password' => 'secret123'
    ],
    'employee' => [
        [
            'id' => 2,
            'last_name' => 'Smith',
            'first_name' => 'John',
            'function' => 'employee',
            'email' => 'john.smith@example.com',
            'password' => 'employee_password_0'
        ],
        [
            'id' => 3,
            'last_name' => 'Johnson',
            'first_name' => 'Michael',
            'function' => 'employee',
            'email' => 'michael.johnson@example.com',
            'password' => 'employee_password_1'
        ],
        [
            'id' => 4,
            'last_name' => 'Williams',
            'first_name' => 'Jennifer',
            'function' => 'employee',
            'email' => 'jennifer.williams@example.com',
            'password' => 'employee_password_2'
        ],
        [
            'id' => 5,
            'last_name' => 'Brown',
            'first_name' => 'Christopher',
            'function' => 'employee',
            'email' => 'christopher.brown@example.com',
            'password' => 'employee_password_3'
        ],
        [
            'id' => 6,
            'last_name' => 'Jones',
            'first_name' => 'Jessica',
            'function' => 'employee',
            'email' => 'jessica.jones@example.com',
            'password' => 'employee_password_4'
        ],
        [
            'id' => 7,
            'last_name' => 'Miller',
            'first_name' => 'David',
            'function' => 'employee',
            'email' => 'david.miller@example.com',
            'password' => 'employee_password_5'
        ],
        [
            'id' => 8,
            'last_name' => 'Davis',
            'first_name' => 'Sarah',
            'function' => 'employee',
            'email' => 'sarah.davis@example.com',
            'password' => 'employee_password_6'
        ],
        [
            'id' => 9,
            'last_name' => 'Garcia',
            'first_name' => 'Matthew',
            'function' => 'employee',
            'email' => 'matthew.garcia@example.com',
            'password' => 'employee_password_7'
        ],
        [
            'id' => 10,
            'last_name' => 'Rodriguez',
            'first_name' => 'Laura',
            'function' => 'employee',
            'email' => 'laura.rodriguez@example.com',
            'password' => 'employee_password_8'
        ],
        [
            'id' => 11,
            'last_name' => 'Wilson',
            'first_name' => 'Andrew',
            'function' => 'employee',
            'email' => 'andrew.wilson@example.com',
            'password' => 'employee_password_9'
        ]
    ],
    'client' => [
        [
            'id' => 0,
            'last_name' => 'Johnson',
            'first_name' => 'Karen',
            'function' => 'client',
            'email' => 'karen.johnson@example.com',
            'messages' => [
                'title' => 'Bonjour',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ],
            'note' => [
                'note' => 4,
                'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ]
        ],
        [
            'id' => 1,
            'last_name' => 'Anderson',
            'first_name' => 'James',
            'function' => 'client',
            'email' => 'james.anderson@example.com',
            'messages' => [
                'title' => 'Bonjour',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ],
            'note' => [
                'note' => 3,
                'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ]
        ],
        [
            'id' => 2,
            'last_name' => 'Thomas',
            'first_name' => 'Linda',
            'function' => 'client',
            'email' => 'linda.thomas@example.com',
            'messages' => [
                'title' => 'Bonjour',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ],
            'note' => [
                'note' => 5,
                'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ]
        ],
        [
            'id' => 3,
            'last_name' => 'Jackson',
            'first_name' => 'William',
            'function' => 'client',
            'email' => 'william.jackson@example.com',
            'messages' => [
                'title' => 'Bonjour',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ],
            'note' => [
                'note' => 2,
                'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ]
        ],
        [
            'id' => 4,
            'last_name' => 'White',
            'first_name' => 'Patricia',
            'function' => 'client',
            'email' => 'patricia.white@example.com',
            'messages' => [
                'title' => 'Bonjour',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ],
            'note' => [
                'note' => 4,
                'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ]
        ],
        [
            'id' => 5,
            'last_name' => 'Harris',
            'first_name' => 'Robert',
            'function' => 'client',
            'email' => 'robert.harris@example.com',
            'messages' => [
                'title' => 'Bonjour',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ],
            'note' => [
                'note' => 1,
                'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ]
        ],
        [
            'id' => 6,
            'last_name' => 'Clark',
            'first_name' => 'Mary',
            'function' => 'client',
            'email' => 'mary.clark@example.com',
            'messages' => [
                'title' => 'Bonjour',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ],
            'note' => [
                'note' => 3,
                'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ]
        ],
        [
            'id' => 7,
            'last_name' => 'Lewis',
            'first_name' => 'David',
            'function' => 'client',
            'email' => 'david.lewis@example.com',
            'messages' => [
                'title' => 'Bonjour',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ],
            'note' => [
                'note' => 5,
                'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ]
        ]
    ]
];
