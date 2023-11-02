<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\PageBlock;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = config("laravellocalization.supportedLocales");

        $pages = [
            // Home page
            [
                'parent_id' => 0,
                'group_code' => 'HOME',
                'code' => 'HOME',
                'theme' => 'home',
                'active' => 1,
                'title' => "Home",
                'content' => '',
                'slug' => '/',
                'blocks' => [
                    [
                        "parent_id" => "",
                        "code" => "HOME-SLIDER",
                        "types" => ["TYPE_NAME"],
                        "values" => [
                            'Home Slider'
                        ]
                    ],
                        [
                            "parent_id" => "HOME-SLIDER",
                            "code" => "HOME-SLIDER-1",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_ICON", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Business Clients',
                                'Get Started as a <br/>Business Client',
                                'Putting Customers First Through Service, Value And Communication',
                                '/assets/images/icon1.png',
                                '/assets/images/slider-image1.jpeg'
                            ]
                        ],
                        [
                            "parent_id" => "HOME-SLIDER",
                            "code" => "HOME-SLIDER-2",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_ICON", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Carriers',
                                'Get Started as a <br/>Carrier',
                                'Putting Customers First Through Service, Value And Communication',
                                '/assets/images/icon2.png',
                                '/assets/images/slider-image2.jpeg'
                            ]
                        ],
                        [
                            "parent_id" => "HOME-SLIDER",
                            "code" => "HOME-SLIDER-3",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_ICON", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Personal Vehicles',
                                'Get Started as a <br/>Personal Vehicles',
                                'Putting Customers First Through Service, Value And Communication',
                                '/assets/images/icon3.png',
                                '/assets/images/slider-image3.jpeg'
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "HOME-WHY-USE",
                        "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_PHOTO"],
                        "values" => [
                            'Why Use Advantage Logistics',
                            'A forward-thinking automotive logistics and consulting company bringing <br/>innovative solutions to solve the toughest logistical issues.',
                            '/assets/images/bg-service.jpeg'
                        ]
                    ],
                        [
                            "parent_id" => "HOME-WHY-USE",
                            "code" => "HOME-WHY-USE-1",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/business-icon15645.png',
                                'Honest communication',
                                'We take pride in honest communication with its customers.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "HOME-WHY-USE",
                            "code" => "HOME-WHY-USE-2",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img555new.png',
                                'Consistent reliability',
                                'Advantage logistics is reliable first time and everytime.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "HOME-WHY-USE",
                            "code" => "HOME-WHY-USE-3",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img3231new.png',
                                'Experience',
                                'We bring a combined experience of years in Logistics.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "HOME-WHY-USE",
                            "code" => "HOME-WHY-USE-4",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/businesspage-icon7.png',
                                'Fast delivery',
                                'Unmatched fast delivery everytime when we are on the case.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "HOME-WHY-USE",
                            "code" => "HOME-WHY-USE-5",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/business-icon7.png',
                                'Accountability',
                                'Responsible business techniques are practiced at Advantage Logistics.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "HOME-COMMUNICATION",
                        "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_URL"],
                        "values" => [
                            '/assets/images/call-action-icon.png',
                            'COMMUNICATION, CLIENT-FOCUSED SOLUTIONS AND <br/>EXPERIENCE MEAN DELIVERY DONE RIGHT',
                            '#'
                        ]
                    ],
                    [
                        "parent_id" => "",
                        "code" => "HOME-GET-A-FREE",
                        "types" => ["TYPE_NAME", "TYPE_DESCRIPTION"],
                        "values" => [
                            'Get a Free Personal Vehicle Quote',
                            'Fill in the form or contact us and we will get you a free quote right away that <br/>suits your needs and gives you market competitive pricing.'
                        ]
                    ],
                    [
                        "parent_id" => "",
                        "code" => "HOME-GRID",
                        "types" => ["TYPE_NAME"],
                        "values" => [
                            'Home Grid'
                        ]
                    ],
                        [
                            "parent_id" => "HOME-GRID",
                            "code" => "HOME-GRID-1",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_ICON", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Business Clients',
                                'Get Started as a <br/>Business Client',
                                'We work with Automotive Dealers, Car Auctions, Auto Remarketing Companies, Mobility Companies, OEMs, Fleet Management Companies, Relocation & Moving Companies, Automotive outfitters/up-fitters.',
                                '/assets/images/listing-service-icon1.png',
                                '/assets/images/listing-service-image2.jpeg'
                            ]
                        ],
                        [
                            "parent_id" => "HOME-GRID",
                            "code" => "HOME-GRID-2",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_ICON", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Carriers',
                                'Get Started as a <br/>Carrier',
                                'Become a Advantage Logistics carrier partner and join our network. We’re one of the fastest-growing transportation and logistics companies in the country. We offer steady freight, reliable support, and prompt payment.',
                                '/assets/images/listing-service-icon2.png',
                                '/assets/images/listing-service-image3.jpeg'
                            ]
                        ],
                        [
                            "parent_id" => "HOME-GRID",
                            "code" => "HOME-GRID-3",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_ICON", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Personal Vehicles',
                                'Get Started as a <br/>Personal Vehicle',
                                'We work with Automotive Dealers, Car Auctions, Auto Remarketing Companies, Mobility Companies, OEMs, Fleet Management Companies, Relocation & Moving Companies, Automotive outfitters/up-fitters.',
                                '/assets/images/listing-service-icon3.png',
                                '/assets/images/listing-service-image4.jpeg'
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "HOME-CONTACT",
                        "types" => ["TYPE_NAME", "TYPE_PHOTO"],
                        "values" => [
                            'Contact Advantage Logistics',
                            '/assets/images/bg-contact.jpeg'
                        ]
                    ],
                ]
            ],
            // End home page

            // Business client page
            [
                'parent_id' => 0,
                'group_code' => 'BUSINESS-CLIENT',
                'code' => 'BUSINESS-CLIENT',
                'theme' => 'business-client',
                'active' => 1,
                'title' => "Business Client",
                'content' => '',
                'slug' => 'business-client',
                'blocks' => [
                    [
                        "parent_id" => "",
                        "code" => "BUSINESS-CLIENT-SLIDER",
                        "types" => ["TYPE_NAME"],
                        "values" => [
                            'Slider'
                        ]
                    ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SLIDER",
                            "code" => "BUSINESS-CLIENT-SLIDER-1",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Automotive Dealers',
                                'Get Started as a <br/>Business Client',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/auto-dealer-bg.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SLIDER",
                            "code" => "BUSINESS-CLIENT-SLIDER-2",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Automobile Auctions',
                                'Get Started as a <br/>Business Client',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/auto-dealer-bg1.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SLIDER",
                            "code" => "BUSINESS-CLIENT-SLIDER-3",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Auto Remarketing Companies',
                                'Get Started as a <br/>Business Client',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/auto-dealer-bg2.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SLIDER",
                            "code" => "BUSINESS-CLIENT-SLIDER-4",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Car Rental Companies',
                                'Get Started as a <br/>Business Client',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/auto-dealer-bg5.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SLIDER",
                            "code" => "BUSINESS-CLIENT-SLIDER-5",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Mobility Companies',
                                'Get Started as a <br/>Business Client',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/auto-dealer-bg3.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SLIDER",
                            "code" => "BUSINESS-CLIENT-SLIDER-6",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Specialty Vehicle Manufacturers',
                                'Get Started as a <br/>Business Client',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/auto-dealer-bg9.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SLIDER",
                            "code" => "BUSINESS-CLIENT-SLIDER-7",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Automotive outfitters/up-fitters',
                                'Get Started as a <br/>Business Client',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/auto-dealer-bg7.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SLIDER",
                            "code" => "BUSINESS-CLIENT-SLIDER-8",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Relocation & Moving Companies',
                                'Get Started as a <br/>Business Client',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/auto-dealer-bg6.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SLIDER",
                            "code" => "BUSINESS-CLIENT-SLIDER-9",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Financial Institutions',
                                'Get Started as a <br/>Business Client',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/auto-dealer-bg4.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SLIDER",
                            "code" => "BUSINESS-CLIENT-SLIDER-10",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Corporations Managing Commercial Fleets',
                                'Get Started as a <br/>Business Client',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/auto-dealer-bg8.jpg'
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "BUSINESS-CLIENT-WHO-WE-SERVE",
                        "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_PHOTO"],
                        "values" => [
                            'Who We Serve',
                            'We partner with',
                            '/assets/images/about-image1.png'
                        ]
                    ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHO-WE-SERVE",
                            "code" => "BUSINESS-CLIENT-WHO-WE-SERVE-1",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Automotive Dealers'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHO-WE-SERVE",
                            "code" => "BUSINESS-CLIENT-WHO-WE-SERVE-2",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Automobile Auctions'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHO-WE-SERVE",
                            "code" => "BUSINESS-CLIENT-WHO-WE-SERVE-3",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Auto Remarketing Companies'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHO-WE-SERVE",
                            "code" => "BUSINESS-CLIENT-WHO-WE-SERVE-4",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Car Rental Companies'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHO-WE-SERVE",
                            "code" => "BUSINESS-CLIENT-WHO-WE-SERVE-5",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Mobility Companies'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHO-WE-SERVE",
                            "code" => "BUSINESS-CLIENT-WHO-WE-SERVE-6",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Specialty Vehicle Manufacturers'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHO-WE-SERVE",
                            "code" => "BUSINESS-CLIENT-WHO-WE-SERVE-7",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Automotive outfitters/up-fitters'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHO-WE-SERVE",
                            "code" => "BUSINESS-CLIENT-WHO-WE-SERVE-8",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Relocation & Moving Companies'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHO-WE-SERVE",
                            "code" => "BUSINESS-CLIENT-WHO-WE-SERVE-9",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Financial Institutions'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHO-WE-SERVE",
                            "code" => "BUSINESS-CLIENT-WHO-WE-SERVE-10",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Corporations Managing Commercial Fleets'
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "BUSINESS-CLIENT-MORE-INFORMATION",
                        "types" => ["TYPE_NAME"],
                        "values" => [
                            'More Information'
                        ]
                    ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-MORE-INFORMATION",
                            "code" => "BUSINESS-CLIENT-MORE-INFORMATION-1",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Automotive Dealers',
                                'Get Started as a <br/>Business Client',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/auto-dealer-bg.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-MORE-INFORMATION",
                            "code" => "BUSINESS-CLIENT-MORE-INFORMATION-2",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Automobile Auctions',
                                'Get Started as a <br/>Business Client',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/auto-dealer-bg1.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-MORE-INFORMATION",
                            "code" => "BUSINESS-CLIENT-MORE-INFORMATION-3",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Auto Remarketing Companies',
                                'Get Started as a <br/>Business Client',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/auto-dealer-bg2.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-MORE-INFORMATION",
                            "code" => "BUSINESS-CLIENT-MORE-INFORMATION-4",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Car Rental Companies',
                                'Get Started as a <br/>Business Client',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/auto-dealer-bg5.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-MORE-INFORMATION",
                            "code" => "BUSINESS-CLIENT-MORE-INFORMATION-5",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Mobility Companies',
                                'Get Started as a <br/>Business Client',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/auto-dealer-bg3.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-MORE-INFORMATION",
                            "code" => "BUSINESS-CLIENT-MORE-INFORMATION-6",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Specialty Vehicle Manufacturers',
                                'Get Started as a <br/>Business Client',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/auto-dealer-bg9.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-MORE-INFORMATION",
                            "code" => "BUSINESS-CLIENT-MORE-INFORMATION-7",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Automotive outfitters/up-fitters',
                                'Get Started as a <br/>Business Client',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/auto-dealer-bg7.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-MORE-INFORMATION",
                            "code" => "BUSINESS-CLIENT-MORE-INFORMATION-8",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Relocation & Moving Companies',
                                'Get Started as a <br/>Business Client',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/auto-dealer-bg6.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-MORE-INFORMATION",
                            "code" => "BUSINESS-CLIENT-MORE-INFORMATION-9",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Financial Institutions',
                                'Get Started as a <br/>Business Client',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/auto-dealer-bg4.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-MORE-INFORMATION",
                            "code" => "BUSINESS-CLIENT-MORE-INFORMATION-10",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Corporations Managing Commercial Fleets',
                                'Get Started as a <br/>Business Client',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/auto-dealer-bg8.jpg'
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "BUSINESS-CLIENT-SERVICES-OFFERED",
                        "types" => ["TYPE_NAME"],
                        "values" => [
                            'Services Offered'
                        ]
                    ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SERVICES-OFFERED",
                            "code" => "BUSINESS-CLIENT-SERVICES-OFFERED-1",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img5.png',
                                'Custom Transportation Solutions',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SERVICES-OFFERED",
                            "code" => "BUSINESS-CLIENT-SERVICES-OFFERED-2",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img35435new.png',
                                'Implementation and Deployment',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SERVICES-OFFERED",
                            "code" => "BUSINESS-CLIENT-SERVICES-OFFERED-3",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img33123new.png',
                                'Fleet Transport Management',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SERVICES-OFFERED",
                            "code" => "BUSINESS-CLIENT-SERVICES-OFFERED-4",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/businesspage-icon4.png',
                                'Repossessed Collateral Management',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SERVICES-OFFERED",
                            "code" => "BUSINESS-CLIENT-SERVICES-OFFERED-5",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img34234new.png',
                                'Transportation Consulting Services',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SERVICES-OFFERED",
                            "code" => "BUSINESS-CLIENT-SERVICES-OFFERED-6",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/businesspage-icon6.png',
                                'Long-distance Sales and Trade-ins',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-SERVICES-OFFERED",
                            "code" => "BUSINESS-CLIENT-SERVICES-OFFERED-7",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/commercial-image1.png',
                                'Commercial Vehicle Shipping',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "BUSINESS-CLIENT-BENEFITS",
                        "types" => ["TYPE_NAME", "TYPE_PHOTO"],
                        "values" => [
                            'Benefits',
                            '/assets/images/truck.png',
                        ]
                    ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-BENEFITS",
                            "code" => "BUSINESS-CLIENT-BENEFITS-1",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Reduce Cost'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-BENEFITS",
                            "code" => "BUSINESS-CLIENT-BENEFITS-2",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Increase Speed to Market'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-BENEFITS",
                            "code" => "BUSINESS-CLIENT-BENEFITS-3",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Reducing Risk'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-BENEFITS",
                            "code" => "BUSINESS-CLIENT-BENEFITS-4",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Improve Visibility'
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-BENEFITS",
                            "code" => "BUSINESS-CLIENT-BENEFITS-5",
                            "types" => ["TYPE_NAME"],
                            "values" => [
                                'Higher Productivity'
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "BUSINESS-CLIENT-WHY-USE",
                        "types" => ["TYPE_NAME", "TYPE_DESCRIPTION"],
                        "values" => [
                            'Why Use Advantage Logistics',
                            'A forward-thinking automotive logistics and consulting company bringing innovative <br/>solutions to solve the toughest logistical issues.'
                        ]
                    ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHY-USE",
                            "code" => "BUSINESS-CLIENT-WHY-USE-1",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/business-icon15645.png',
                                'Honest communication',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHY-USE",
                            "code" => "BUSINESS-CLIENT-WHY-USE-2",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img555new.png',
                                'Consistent reliability',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHY-USE",
                            "code" => "BUSINESS-CLIENT-WHY-USE-3",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img35663123new.png',
                                'Attentive service',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHY-USE",
                            "code" => "BUSINESS-CLIENT-WHY-USE-4",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img3231new.png',
                                'Experience',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHY-USE",
                            "code" => "BUSINESS-CLIENT-WHY-USE-5",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/business-icon5.png',
                                'Fast delivery',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHY-USE",
                            "code" => "BUSINESS-CLIENT-WHY-USE-6",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/business-icon8weqw11.png',
                                'Flat Rate Pricing Option',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHY-USE",
                            "code" => "BUSINESS-CLIENT-WHY-USE-7",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img35435sdasnew.png',
                                'Integrity',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "BUSINESS-CLIENT-WHY-USE",
                            "code" => "BUSINESS-CLIENT-WHY-USE-8",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/business-icon7.png',
                                'Accountability',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                ]
            ],
            // End Business client page

            // Carrier page
            [
                'parent_id' => 0,
                'group_code' => 'CARRIER',
                'code' => 'CARRIER',
                'theme' => 'carrier',
                'active' => 1,
                'title' => "Carriers",
                'content' => '',
                'slug' => 'carrier',
                'blocks' => [
                    [
                        "parent_id" => "",
                        "code" => "CARRIER-BANNER",
                        "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_URL", "TYPE_PHOTO"],
                        "values" => [
                            'CARRIERS',
                            'Get Started as a <br/>Carrier',
                            "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.",
                            '#',
                            '/assets/images/carrier-image1.jpg'
                        ]
                    ],
                    [
                        "parent_id" => "",
                        "code" => "CARRIER-HISTORY",
                        "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_URL", "TYPE_PHOTO"],
                        "values" => [
                            'Lorem Lipsum Heading',
                            'Get Started as a <br/>Carrier',
                            "Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
                            '#',
                            '/assets/images/carer-image12.jpg'
                        ]
                    ],
                    [
                        "parent_id" => "",
                        "code" => "CARRIER-PARTNER",
                        "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_URL"],
                        "values" => [
                            'A Dependable Partner with Advantage Logistics',
                            'Get Started as a <br/>Carrier',
                            'A dependable partner to keep your business moving forward.',
                            '#'
                        ]
                    ],
                        [
                            "parent_id" => "CARRIER-PARTNER",
                            "code" => "CARRIER-PARTNER-1",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img3fdsfsdfnew.png',
                                '100% on Time Pay',
                                'Get paid quick for your service without hiccups.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "CARRIER-PARTNER",
                            "code" => "CARRIER-PARTNER-2",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img3dasdnew.png',
                                'Flexible Payment Options',
                                'Receive payments via flexible options as you see fit.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "CARRIER-PARTNER",
                            "code" => "CARRIER-PARTNER-3",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img3dasdnew1.png',
                                'Efficient Application Process',
                                'Get your application processed swiftly and quickly.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "CARRIER-PARTNER",
                            "code" => "CARRIER-PARTNER-4",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/carrier-image4.png',
                                'Loads That Fit Your Travel Area',
                                'We appoint loads to you that fit your covered area.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "CARRIER-PARTNER",
                            "code" => "CARRIER-PARTNER-5",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/businesspage-icon4-5.png',
                                'Steady Shipment Volume',
                                'We can cater to mass volume using our country wide network.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "CARRIER-PARTNER",
                            "code" => "CARRIER-PARTNER-6",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img3sdadnew3.png',
                                'Easy to Work With',
                                'Our tools make it super easy for you to work with us.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "CARRIER-PARTNER",
                            "code" => "CARRIER-PARTNER-7",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img3dasd4.png',
                                'Respect',
                                'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "CARRIER-PARTNER",
                            "code" => "CARRIER-PARTNER-8",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img3dasd5.png',
                                'Trustworthy',
                                'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "CARRIER-PARTNER",
                            "code" => "CARRIER-PARTNER-9",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img3dasd7.png',
                                'Long-term Partnership',
                                'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                ]
            ],
            
            // End Carrier page

            // Personal Vehicles page
            [
                'parent_id' => 0,
                'group_code' => 'PERSONAL-VEHICLES',
                'code' => 'PERSONAL-VEHICLES',
                'theme' => 'personal-vehicles',
                'active' => 1,
                'title' => "Personal Vehicles",
                'content' => '',
                'slug' => 'personal-vehicles',
                'blocks' => [
                    [
                        "parent_id" => "",
                        "code" => "PERSONAL-VEHICLES-SLIDER",
                        "types" => ["TYPE_NAME"],
                        "values" => [
                            'Slider'
                        ]
                    ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SLIDER",
                            "code" => "PERSONAL-VEHICLES-SLIDER-1",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Online Auto Purchase and Sale Transport',
                                'Get Started as a <br/>Personal Vehicle',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/personal-vehicle-image1.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SLIDER",
                            "code" => "PERSONAL-VEHICLES-SLIDER-2",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Exotic car transport',
                                'Get Started as a <br/>Personal Vehicle',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/personal-vehicle-image3.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SLIDER",
                            "code" => "PERSONAL-VEHICLES-SLIDER-3",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Off-road vehicle transport',
                                'Get Started as a <br/>Personal Vehicle',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/personal-vehicle-image4.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SLIDER",
                            "code" => "PERSONAL-VEHICLES-SLIDER-4",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Military service moves',
                                'Get Started as a <br/>Personal Vehicle',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/personal-vehicle-image5.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SLIDER",
                            "code" => "PERSONAL-VEHICLES-SLIDER-5",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Job relocation auto transport',
                                'Get Started as a <br/>Personal Vehicle',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/personal-vehicle-image6.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SLIDER",
                            "code" => "PERSONAL-VEHICLES-SLIDER-6",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Collectors / enthusiasts',
                                'Get Started as a <br/>Personal Vehicle',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/personal-vehicle-image7.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SLIDER",
                            "code" => "PERSONAL-VEHICLES-SLIDER-7",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Seasonal Vehicle Relocation',
                                'Get Started as a <br/>Personal Vehicle',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/personal-vehicle-image8.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SLIDER",
                            "code" => "PERSONAL-VEHICLES-SLIDER-8",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'College students',
                                'Get Started as a <br/>Personal Vehicle',
                                "There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by <br>injected humour or randomised words which don't look even slightly believable.",
                                '/assets/images/personal-vehicle-image9.jpg'
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "PERSONAL-VEHICLES-HISTORY",
                        "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_PHOTO"],
                        "values" => [
                            'Reliable, Worry Free Delivery',
                            'We ensure safe, timely delivery of your vehicles for online auto purchase transport, online auto sales transport, exotic car transport, off-road vehicle transport, military service moves, job relocation auto transport, collector car transport, seasonal move auto transport service, and car transport for college students.',
                            '/assets/images/about-image4.jpg',
                        ]
                    ],
                    [
                        "parent_id" => "",
                        "code" => "PERSONAL-VEHICLES-MORE-INFORMATION",
                        "types" => ["TYPE_NAME"],
                        "values" => [
                            'More Information'
                        ]
                    ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-MORE-INFORMATION",
                            "code" => "PERSONAL-VEHICLES-MORE-INFORMATION-1",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Online Auto Purchase and Sale Transport',
                                'Get Started as a <br/>Personal Vehicle',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/personal-vehicle-image1.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-MORE-INFORMATION",
                            "code" => "PERSONAL-VEHICLES-MORE-INFORMATION-2",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Exotic car transport',
                                'Get Started as a <br/>Personal Vehicle',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/personal-vehicle-image3.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-MORE-INFORMATION",
                            "code" => "PERSONAL-VEHICLES-MORE-INFORMATION-3",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Off-road vehicle transport',
                                'Get Started as a <br/>Personal Vehicle',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/personal-vehicle-image4.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-MORE-INFORMATION",
                            "code" => "PERSONAL-VEHICLES-MORE-INFORMATION-4",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Military service moves',
                                'Get Started as a <br/>Personal Vehicle',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/personal-vehicle-image5.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-MORE-INFORMATION",
                            "code" => "PERSONAL-VEHICLES-MORE-INFORMATION-5",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Job relocation auto transport',
                                'Get Started as a <br/>Personal Vehicle',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/personal-vehicle-image6.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-MORE-INFORMATION",
                            "code" => "PERSONAL-VEHICLES-MORE-INFORMATION-6",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Collectors / enthusiasts',
                                'Get Started as a <br/>Personal Vehicle',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/personal-vehicle-image7.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-MORE-INFORMATION",
                            "code" => "PERSONAL-VEHICLES-MORE-INFORMATION-7",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'Seasonal Vehicle Relocation',
                                'Get Started as a <br/>Personal Vehicle',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/personal-vehicle-image8.jpg'
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-MORE-INFORMATION",
                            "code" => "PERSONAL-VEHICLES-MORE-INFORMATION-8",
                            "types" => ["TYPE_URL", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"],
                            "values" => [
                                '#',
                                'College students',
                                'Get Started as a <br/>Personal Vehicle',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                                '/assets/images/personal-vehicle-image9.jpg'
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "PERSONAL-VEHICLES-SERVICES-OFFERED",
                        "types" => ["TYPE_NAME"],
                        "values" => [
                            'Services Offered'
                        ]
                    ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SERVICES-OFFERED",
                            "code" => "PERSONAL-VEHICLES-SERVICES-OFFERED-1",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/businesspage-icon6.png',
                                'Ecommerce Sales',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SERVICES-OFFERED",
                            "code" => "PERSONAL-VEHICLES-SERVICES-OFFERED-2",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img3asd8.png',
                                'Trade-Ins',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SERVICES-OFFERED",
                            "code" => "PERSONAL-VEHICLES-SERVICES-OFFERED-3",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/service-list-img8.png',
                                'Open Transport',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SERVICES-OFFERED",
                            "code" => "PERSONAL-VEHICLES-SERVICES-OFFERED-4",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/commercial-image1.png',
                                'Open',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SERVICES-OFFERED",
                            "code" => "PERSONAL-VEHICLES-SERVICES-OFFERED-5",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/businesspage-icon3.png',
                                'Enclosed Transport',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SERVICES-OFFERED",
                            "code" => "PERSONAL-VEHICLES-SERVICES-OFFERED-6",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/businesspage-icon7.png',
                                'Expedited Transport',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "PERSONAL-VEHICLES-WHY-USE",
                        "types" => ["TYPE_NAME", "TYPE_DESCRIPTION"],
                        "values" => [
                            'Why Use Advantage Logistics',
                            'A service-oriented automotive logistics provider delivering safety and confidence to your driveway.'
                        ]
                    ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-WHY-USE",
                            "code" => "PERSONAL-VEHICLES-WHY-USE-1",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/business-icon83123new.png',
                                'Safety First',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-WHY-USE",
                            "code" => "PERSONAL-VEHICLES-WHY-USE-2",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/business-icon8eqwe1.png',
                                'Reliable Service',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-WHY-USE",
                            "code" => "PERSONAL-VEHICLES-WHY-USE-3",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/business-icon15645.png',
                                'Honest Communication',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-WHY-USE",
                            "code" => "PERSONAL-VEHICLES-WHY-USE-4",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/business-icon8weqw11.png',
                                'Transparent Pricing',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-WHY-USE",
                            "code" => "PERSONAL-VEHICLES-WHY-USE-5",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/Insurance-image1.png',
                                'Included Insurance Coverage',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-WHY-USE",
                            "code" => "PERSONAL-VEHICLES-WHY-USE-6",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/business-icon8dsads1.png',
                                'Simple Process',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-WHY-USE",
                            "code" => "PERSONAL-VEHICLES-WHY-USE-7",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"],
                            "values" => [
                                '/assets/images/business-icon8dasdas21.png',
                                'Personalized Approach',
                                'There are many variations of passages of Lorem Ipsum.',
                                "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable."
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "PERSONAL-VEHICLES-HOW-OUR",
                        "types" => ["TYPE_NAME", "TYPE_DESCRIPTION"],
                        "values" => [
                            'How Our Process Works',
                            "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has <br/>been the industry's standard dummy text ever since the 1500s Ipsum."
                        ]
                    ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-HOW-OUR",
                            "code" => "PERSONAL-VEHICLES-HOW-OUR-1",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/howwork-icon2.png',
                                'Get a Quote',
                                "Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-HOW-OUR",
                            "code" => "PERSONAL-VEHICLES-HOW-OUR-2",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/howwork-icon1.png',
                                'Place Order',
                                "Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-HOW-OUR",
                            "code" => "PERSONAL-VEHICLES-HOW-OUR-3",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/howwork-icon3.png',
                                'Schedule',
                                "Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-HOW-OUR",
                            "code" => "PERSONAL-VEHICLES-HOW-OUR-4",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/howwork-icon4.png',
                                'Hand Over Key',
                                "Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-HOW-OUR",
                            "code" => "PERSONAL-VEHICLES-HOW-OUR-5",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/howwork-icon5.png',
                                'Accept Delivery',
                                "Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis."
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "PERSONAL-VEHICLES-SITE-CALLACTION",
                        "types" => ["TYPE_NAME"],
                        "values" => [
                            'Site Callaction',
                        ]
                    ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SITE-CALLACTION",
                            "code" => "PERSONAL-VEHICLES-SITE-CALLACTION-1",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/business-bottom-icon1.jpg',
                                'Extended Office Hours',
                                "We're available past normal business hours in every time zone in the country."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SITE-CALLACTION",
                            "code" => "PERSONAL-VEHICLES-SITE-CALLACTION-2",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/iconbusiness3.jpg',
                                'Nationwide door-to-door service',
                                "Advantage logistics provides door-to-door service acroos the U.S."
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "PERSONAL-VEHICLES-GET-A-FREE",
                        "types" => ["TYPE_NAME", "TYPE_DESCRIPTION"],
                        "values" => [
                            'Get a Free Personal Vehicle Quote',
                            'Fill in the form or contact us and we will get you a free quote right away that <br/>suits your needs and gives you market competitive pricing.'
                        ]
                    ],
                    [
                        "parent_id" => "",
                        "code" => "PERSONAL-VEHICLES-FACTOR",
                        "types" => ["TYPE_NAME"],
                        "values" => [
                            'Factors that Determine your Car Shipping Costs',
                        ]
                    ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-FACTOR",
                            "code" => "PERSONAL-VEHICLES-FACTOR-1",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/iconbusiness11.jpg',
                                'Distance',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard typesetting industry."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-FACTOR",
                            "code" => "PERSONAL-VEHICLES-FACTOR-2",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/iconbusiness12.jpg',
                                'Open or Enclosed',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard typesetting industry."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-FACTOR",
                            "code" => "PERSONAL-VEHICLES-FACTOR-3",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/iconbusiness13.jpg',
                                'Vehicle Type & Size',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard typesetting industry."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-FACTOR",
                            "code" => "PERSONAL-VEHICLES-FACTOR-4",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/iconbusiness14.jpg',
                                'Running or Not',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard typesetting industry."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-FACTOR",
                            "code" => "PERSONAL-VEHICLES-FACTOR-5",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/iconbusiness15.jpg',
                                'Popularity of the Route',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard typesetting industry."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-FACTOR",
                            "code" => "PERSONAL-VEHICLES-FACTOR-6",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/iconbusiness16.jpg',
                                'Dates / Season of Year',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard typesetting industry."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-FACTOR",
                            "code" => "PERSONAL-VEHICLES-FACTOR-7",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/iconbusiness16.png',
                                'Flexibility of Dates',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard typesetting industry."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-FACTOR",
                            "code" => "PERSONAL-VEHICLES-FACTOR-8",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/iconbusiness17.png',
                                'Transport Speed',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard typesetting industry."
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "PERSONAL-VEHICLES-SHIPPING",
                        "types" => ["TYPE_NAME"],
                        "values" => [
                            'How Long Does it Take to Ship a Car'
                        ]
                    ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SHIPPING",
                            "code" => "PERSONAL-VEHICLES-SHIPPING-1",
                            "types" => ["TYPE_NAME", "TYPE_CONTENT"],
                            "values" => [
                                'From Order to Pick-up...',
                                "<p> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley. </p>
                                <div class=\"listing-two-wrapper\">
                                  <div class=\"row\">
                                    <div class=\"col-md-3\"> <img src=\"/assets/images/iconbusiness16.jpg\" alt=\"icon\"> </div>
                                    <div class=\"col-md-9\">
                                      <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley. </p>
                                    </div>
                                  </div>
                                </div>
                                <div class=\"listing-two-wrapper\">
                                  <div class=\"row\">
                                    <div class=\"col-md-3\"> <img src=\"/assets/images/iconbusiness125.jpg\" alt=\"icon\"> </div>
                                    <div class=\"col-md-9\">
                                      <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley. </p>
                                    </div>
                                  </div>
                                </div>"
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SHIPPING",
                            "code" => "PERSONAL-VEHICLES-SHIPPING-2",
                            "types" => ["TYPE_NAME", "TYPE_CONTENT"],
                            "values" => [
                                'Then after Pick-up,',
                                "<div class=\"table-responsive\">
                                <table border=\"1\" class=\"table\">
                                  <tr>
                                    <td width=\"45%\"><strong> Miles</strong></td>
                                    <td width=\"55%\"><strong> Calendar Days</strong></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <ul>
                                        <li>0 – 200</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul>
                                        <li>1 to 2 days</li>
                                      </ul>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <ul>
                                        <li>200 – 600</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul>
                                        <li>1 to 3</li>
                                      </ul>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <ul>
                                        <li>600 – 1000</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul>
                                        <li>2 to 3</li>
                                      </ul>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <ul>
                                        <li>1000 – 1500</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul>
                                        <li>3 to 5</li>
                                      </ul>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <ul>
                                        <li>1500 – 2000</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul>
                                        <li>4 to 7</li>
                                      </ul>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <ul>
                                        <li>2000 – 2400</li>
                                      </ul>
                                    </td>
                                    <td>
                                      <ul>
                                        <li>5 to 8</li>
                                      </ul>
                                    </td>
                                  </tr>
                                </table>
                              </div>"
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "PERSONAL-VEHICLES-SHIPPING-TIPS",
                        "types" => ["TYPE_NAME"],
                        "values" => [
                            'Vehicle Shipping Tips',
                        ]
                    ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SHIPPING-TIPS",
                            "code" => "PERSONAL-VEHICLES-SHIPPING-TIPS-1",
                            "types" => ["TYPE_NAME", "TYPE_CONTENT"],
                            "values" => [
                                'Anim pariatur cliche reprehenderit, enim eiusmod',
                                "Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put <br><br>a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SHIPPING-TIPS",
                            "code" => "PERSONAL-VEHICLES-SHIPPING-TIPS-2",
                            "types" => ["TYPE_NAME", "TYPE_CONTENT"],
                            "values" => [
                                'Anim pariatur cliche reprehenderit, enim eiusmod',
                                "Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put <br><br>a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SHIPPING-TIPS",
                            "code" => "PERSONAL-VEHICLES-SHIPPING-TIPS-3",
                            "types" => ["TYPE_NAME", "TYPE_CONTENT"],
                            "values" => [
                                'Anim pariatur cliche reprehenderit, enim eiusmod',
                                "Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put <br><br>a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS."
                            ]
                        ],
                        [
                            "parent_id" => "PERSONAL-VEHICLES-SHIPPING-TIPS",
                            "code" => "PERSONAL-VEHICLES-SHIPPING-TIPS-4",
                            "types" => ["TYPE_NAME", "TYPE_CONTENT"],
                            "values" => [
                                'Anim pariatur cliche reprehenderit, enim eiusmod',
                                "Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put <br><br>a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS."
                            ]
                        ],
                ]
            ],
            // End Personal Vehicles page

            // About page
            [
                'parent_id' => 0,
                'group_code' => 'ABOUT-US',
                'code' => 'ABOUT-US',
                'theme' => 'about-us',
                'active' => 1,
                'title' => "About Us",
                'content' => '',
                'slug' => 'about-us',
                'blocks' => [
                    [
                        "parent_id" => "",
                        "code" => "ABOUT-US-OUR-HISTORY",
                        "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_PHOTO"],
                        "values" => [
                            'Our History',
                            "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.",
                            '/assets/images/about-image1eawe.png',
                        ]
                    ],
                    [
                        "parent_id" => "",
                        "code" => "ABOUT-US-FEATURES",
                        "types" => ["TYPE_NAME", "TYPE_DESCRIPTION"],
                        "values" => [
                            'Add Heading Here',
                            "It is a long established fact that a reader will be distracted by the readable content.",
                        ]
                    ],
                        [
                            "parent_id" => "ABOUT-US-FEATURES",
                            "code" => "ABOUT-US-FEATURES-1",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/feature-icon1.png',
                                'Lorem lipsum Dollar',
                                "It is a long established fact that a reader will be distracted by the readable content.",
                            ]
                        ],
                        [
                            "parent_id" => "ABOUT-US-FEATURES",
                            "code" => "ABOUT-US-FEATURES-2",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/feature-icon1.png',
                                'Lorem lipsum Dollar',
                                "It is a long established fact that a reader will be distracted by the readable content.",
                            ]
                        ],
                        [
                            "parent_id" => "ABOUT-US-FEATURES",
                            "code" => "ABOUT-US-FEATURES-3",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/feature-icon1.png',
                                'Lorem lipsum Dollar',
                                "It is a long established fact that a reader will be distracted by the readable content.",
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "ABOUT-US-GRID",
                        "types" => ["TYPE_NAME"],
                        "values" => [
                            'Grid'
                        ]
                    ],
                        [
                            "parent_id" => "ABOUT-US-GRID",
                            "code" => "ABOUT-US-GRID-1",
                            "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_PHOTO", "TYPE_URL"],
                            "values" => [
                                'Business Clients',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                                . <br>
                                <br>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries Lorem Ipsum has been the industry's standard dummy text.",
                                '/assets/images/about_img1.png',
                                '#'
                            ]
                        ],
                        [
                            "parent_id" => "ABOUT-US-GRID",
                            "code" => "ABOUT-US-GRID-2",
                            "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_PHOTO", "TYPE_URL"],
                            "values" => [
                                'Carriers',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                                . <br>
                                <br>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries Lorem Ipsum has been the industry's standard dummy text.",
                                '/assets/images/about_img2.png',
                                '#'
                            ]
                        ],
                        [
                            "parent_id" => "ABOUT-US-GRID",
                            "code" => "ABOUT-US-GRID-3",
                            "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_PHOTO", "TYPE_URL"],
                            "values" => [
                                'Personal Vehicles',
                                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                                . <br>
                                <br>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries Lorem Ipsum has been the industry's standard dummy text.",
                                '/assets/images/about_img3.png',
                                '#'
                            ]
                        ],
                ]
            ],
            // End About page

            // Contact Us page
            [
                'parent_id' => 0,
                'group_code' => 'CONTACT-US',
                'code' => 'CONTACT-US',
                'theme' => 'contact-us',
                'active' => 1,
                'title' => "Contact Us",
                'content' => '',
                'slug' => 'contact-us',
                'blocks' => [
                    [
                        "parent_id" => "",
                        "code" => "CONTACT-US-GET-IN-TOUCH",
                        "types" => ["TYPE_NAME", "TYPE_DESCRIPTION"],
                        "values" => [
                            'Get In Touch',
                            'A dependable automotive logistics partner.'
                        ]
                    ],
                        [
                            "parent_id" => "CONTACT-US-GET-IN-TOUCH",
                            "code" => "CONTACT-US-GET-IN-TOUCH-1",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/contacticon1.png',
                                'Store Address',
                                '123 Main St,<br/>London, UK'
                            ]
                        ],
                        [
                            "parent_id" => "CONTACT-US-GET-IN-TOUCH",
                            "code" => "CONTACT-US-GET-IN-TOUCH-2",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/contacticon2.png',
                                'Call Us',
                                'Tel: 1.800.555.9090 <br/>Fax: 1.800.555.9090'
                            ]
                        ],
                        [
                            "parent_id" => "CONTACT-US-GET-IN-TOUCH",
                            "code" => "CONTACT-US-GET-IN-TOUCH-3",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/contacticon3.png',
                                'Hours',
                                'Mon-Fri: 10:00 - 20:00 <br/>Weekend: 12:00 - 16:00'
                            ]
                        ],
                        [
                            "parent_id" => "CONTACT-US-GET-IN-TOUCH",
                            "code" => "CONTACT-US-GET-IN-TOUCH-4",
                            "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"],
                            "values" => [
                                '/assets/images/contacticon4.png',
                                'Email Us',
                                'Click Here to send us an email'
                            ]
                        ],
                    [
                        "parent_id" => "",
                        "code" => "CONTACT-US-SEND-US",
                        "types" => ["TYPE_NAME"],
                        "values" => [
                            'Send us an Email',
                        ]
                    ],
                ]
            ],
            // End Contact Us page

            // FAQs page
            [
                'parent_id' => 0,
                'group_code' => 'FAQ',
                'code' => 'FAQ',
                'theme' => 'faq',
                'active' => 1,
                'title' => "FAQs",
                'content' => '',
                'slug' => 'faq',
                'blocks' => [
                    [
                        "parent_id" => "",
                        "code" => "FAQ-BANNER",
                        "types" => ["TYPE_NAME", "TYPE_PHOTO"],
                        "values" => [
                            'Frequently Asked Questions',
                            '/assets/images/FAQ-Banner.jpg'
                        ]
                    ],
                    [
                        "parent_id" => "",
                        "code" => "FAQ-CONTACT-US",
                        "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_URL"],
                        "values" => [
                            'Have a Question Not Answered Here?',
                            'Send Client Services your questions here',
                            '/contact-us'
                        ]
                    ],
                ]
            ],
            // End FAQs page

            // Login page
            [
                'parent_id' => 0,
                'group_code' => 'LOGIN',
                'code' => 'LOGIN',
                'theme' => 'login',
                'active' => 1,
                'title' => "Login",
                'content' => '',
                'slug' => 'login',
                'blocks' => [
                    [
                        "parent_id" => "",
                        "code" => "LOGIN-CONTENT",
                        "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_URL", "TYPE_PHOTO"],
                        "values" => [
                            '<span> Welcome to </span><br>Advantage Logistics',
                            "There are many variations of alteration in some form by injected humour or randomised words which don't look even slightly believable If you are going to use a passage of Lorem Ipsum you need to be sure there isn't anything embarrassing.",
                            '/sign-up',
                            '/assets/images/slider-image1.jpg'
                        ]
                    ]
                ]
            ],
            // End Login page

            // Signup page
            [
                'parent_id' => 0,
                'group_code' => 'SIGNUP',
                'code' => 'SIGNUP',
                'theme' => 'sign-up',
                'active' => 1,
                'title' => "Sign Up",
                'content' => '',
                'slug' => 'sign-up',
                'blocks' => [
                    [
                        "parent_id" => "",
                        "code" => "SIGNUP-CONTENT",
                        "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_URL", "TYPE_PHOTO"],
                        "values" => [
                            '<span> Welcome to </span><br>Advantage Logistics',
                            "There are many variations of alteration in some form by injected humour or randomised words which don't look even slightly believable If you are going to use a passage of Lorem Ipsum you need to be sure there isn't anything embarrassing.",
                            '/sign-up',
                            '/assets/images/slider-image1.jpg'
                        ]
                    ]
                ]
            ],
            // End Signup Confirmation page

            // Forgot password page
            [
                'parent_id' => 0,
                'group_code' => 'FORGOT-PASSWORD',
                'code' => 'FORGOT-PASSWORD',
                'theme' => 'forgot-password',
                'active' => 1,
                'title' => "Forgot Password",
                'content' => '',
                'slug' => 'forgot-password',
                'blocks' => [
                    [
                        "parent_id" => "",
                        "code" => "FORGOT-PASSWORD-CONTENT",
                        "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_URL", "TYPE_PHOTO"],
                        "values" => [
                            '<span> Welcome to </span><br>Advantage Logistics',
                            "There are many variations of alteration in some form by injected humour or randomised words which don't look even slightly believable If you are going to use a passage of Lorem Ipsum you need to be sure there isn't anything embarrassing.",
                            '/login',
                            '/assets/images/slider-image1.jpg'
                        ]
                    ]
                ]
            ],
            // End Forgot password page
        ];

        foreach ($pages as $page) {
            if ($this->checkExistByCode($page['code'])) {
                continue;
            }
            $new_page = array(
                "parent_id" => $page["parent_id"],
                "group_code" => $page["group_code"],
                "code" => $page["code"],
                'theme' => $page["theme"],
                'active' => $page["active"]
            );

            foreach ($locales as $key => $value) {
                $new_page[$key]['title'] = $page["title"];
                $new_page[$key]['content'] = $page["content"];
                $new_page[$key]['slug'] = $page["slug"];
            }

            $file = resource_path("views/themes/" . $page['theme'] . ".blade.php");

            if (!is_file($file))
                file_put_contents($file, '');

            $model = Page::query()->create($new_page);

            if (isset($page['blocks'])) {
                $this->createBlocks($model, $page['blocks']);
            }
        }
    }

    private function createBlocks($model, $blocks)
    {
        $locales = config("laravellocalization.supportedLocales");
        $position = 0;
        $parent_position = 0;

        foreach ($blocks as $key => $value) {

            $value['page_id'] = $model->id;

            if ($value['parent_id']) {
                $value['parent_id'] = $this->findParentByCode($model, $value['parent_id']);
            } else {
                unset($value['parent_id']);
            }

            $types = $value['types'];
            $value['types'] = json_encode($value['types']);


            if ($key >> 0) {
                if ((empty($blocks[$key - 1]['parent_id']) && !empty($blocks[$key]['parent_id']))) {
                    $parent_position = $position;
                    $position = 0;
                }
                if ((!empty($blocks[$key - 1]['parent_id']) && empty($blocks[$key]['parent_id']))) {
                    $position = $parent_position;
                }
            }

            $value['position'] = $position;

            if (!empty($types[0])) {
                foreach ($locales as $key2 => $value2) {
                    foreach ($types as $key3 => $type) {

                        if ($type == 'TYPE_URL') {
                            $prop = 'url';
                        } else if ($type == 'TYPE_NAME') {
                            $prop = 'name';
                        } else if ($type == 'TYPE_DESCRIPTION') {
                            $prop = 'description';
                        } else if ($type == 'TYPE_CONTENT') {
                            $prop = 'content';
                        } else if ($type == 'TYPE_ICON') {
                            $value['icon'] = $value['values'][$key3];
                            continue;
                        } else if ($type == 'TYPE_PHOTO') {
                            $value['photo'] = $value['values'][$key3];
                            continue;
                        } else if ($type == 'TYPE_PHOTO_MOBILE') {
                            $value['photo_mobile'] = $value['values'][$key3];
                            continue;
                        } else if ($type == 'TYPE_PHOTO_TRANSLATION') {
                            $prop = 'photo_translation';
                        }

                        $value[$key2][$prop] = $value["values"][$key3];
                    }
                }
            }

            unset($value['values']);

            $block = $model->blocks()->create($value);

            // Insert multi photo
            if (in_array(PageBlock::TYPE_MULTI_PHOTOS, $block->decode_types)) {
                if (!empty($value['photos'])) {
                    $block->createMedia($value['photos']);
                }
            }

            $position++;
        }
    }

    private function findParentByCode($model, $code)
    {
        return PageBlock::query()->where('page_id', $model->id)->where('code', $code)->first()->id;
    }

    private function checkExistByCode($code)
    {
        return (bool)Page::query()->where('code', $code)->first();
    }
}
