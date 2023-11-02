<?php
return [
    'permission' => [
        'model' => 'Admin',
        'permissions' => [
            'admin.index' => 'Access'
        ]
    ],

    'theme' => [
        'model' => 'Theme',
        'permissions' => [
            'admin.theme.index' => 'Access',
            'admin.theme.create' => 'Create',
            'admin.theme.edit' => 'Edit',
            'admin.theme.show' => 'Show',
            'admin.theme.destroy' => 'Delete',
        ]
    ],

    'page' => [
        'model' => 'Page',
        'permissions' => [
            'admin.page.index' => 'Access',
            'admin.page.create' => 'Create',
            'admin.page.edit' => 'Edit',
            'admin.page.show' => 'Show',
            'admin.page.destroy' => 'Delete',
            'admin.page.multi.delete' => 'Multi delete'
        ]
    ],

    'menu' => [
        'model' => 'Menu Categories',
        'permissions' => [
            'admin.menu.index' => 'Access',
            'admin.menu.create' => 'Create',
            'admin.menu.show' => 'Show',
            'admin.menu.edit' => 'Edit',
            'admin.menu.destroy' => 'Delete'
        ]
    ],

    'menu_item' => [
        'model' => 'Menu',
        'permissions' => [
            'admin.menu.item.index' => 'Access',
            'admin.menu.item.create' => 'Create',
            'admin.menu.item.show' => 'Show',
            'admin.menu.item.edit' => 'Edit',
            'admin.menu.item.destroy' => 'Delete'
        ]
    ],

    'faq_category' => [
        'model' => 'FAQ Category',
        'permissions' => [
            'admin.faq.category.index' => 'Access',
            'admin.faq.category.create' => 'Create',
            'admin.faq.category.show' => 'Show',
            'admin.faq.category.edit' => 'Edit',
            'admin.faq.category.destroy' => 'Delete'
        ]
    ],

    'faq' => [
        'model' => 'FAQ',
        'permissions' => [
            'admin.faq.index' => 'Access',
            'admin.faq.create' => 'Create',
            'admin.faq.show' => 'Show',
            'admin.faq.edit' => 'Edit',
            'admin.faq.destroy' => 'Delete'
        ]
    ],

    'get_a_quote' => [
        'model' => 'GetAQuote',
        'permissions' => [
            'admin.get.a.quote.index' => 'Access',
            'admin.get.a.quote.create' => 'Create',
            'admin.get.a.quote.show' => 'Show',
            'admin.get.a.quote.edit' => 'Edit',
            'admin.get.a.quote.destroy' => 'Delete'
        ]
    ],

    'contact' => [
        'model' => 'Account',
        'permissions' => [
            'admin.contact.index' => 'Access',
            'admin.contact.create' => 'Create',
            'admin.contact.show' => 'Show',
            'admin.contact.edit' => 'Edit',
            'admin.contact.destroy' => 'Delete'
        ]
    ],
    'carrier-load' => [
        'model' => 'CarrierLoad',
        'permissions' => [
            'admin.carrier.load.index' => 'Access',
            'admin.carrier.load.create' => 'Create',
            'admin.carrier.load.show' => 'Show',
            'admin.carrier.load.edit' => 'Edit',
            'admin.carrier.load.destroy' => 'Delete'
        ]
    ],
    'carrier-payment' => [
        'model' => 'TaxPayer',
        'permissions' => [
            'admin.carrier.payment.index' => 'Access',
            'admin.carrier.payment.create' => 'Create',
            'admin.carrier.payment.show' => 'Show',
            'admin.carrier.payment.edit' => 'Edit',
            'admin.carrier.payment.destroy' => 'Delete'
        ]
    ],

    'department' => [
        'model' => 'Department',
        'permissions' => [
            'admin.department.index' => 'Access',
            'admin.department.create' => 'Create',
            'admin.department.show' => 'Show',
            'admin.department.edit' => 'Edit',
            'admin.department.destroy' => 'Delete'
        ]
    ],
    'payment-plan' => [
        'model' => 'PaymentPlan',
        'permissions' => [
            'admin.payment.plan.index' => 'Access',
            'admin.payment.plan.create' => 'Create',
            'admin.payment.plan.show' => 'Show',
            'admin.payment.plan.edit' => 'Edit',
            'admin.payment.plan.destroy' => 'Delete'
        ]
    ],
    'user' => [
        'model' => 'User',
        'permissions' => [
            'admin.user.index' => 'Access',
            'admin.user.create' => 'Create',
            'admin.user.show' => 'Show',
            'admin.user.edit' => 'Edit',
            'admin.user.destroy' => 'Delete',
            'admin.user.set.permission' => 'Authorization'
        ]
    ],
    'account' => [
        'model' => 'Account',
        'permissions' => [
            'admin.account.index' => 'Access',
            'admin.account.create' => 'Create',
            'admin.account.show' => 'Show',
            'admin.account.edit' => 'Edit',
            'admin.account.destroy' => 'Delete',
            'admin.account.set.permission' => 'Authorization'
        ]
    ],
    'company' => [
        'model' => 'Company',
        'permissions' => [
            'admin.company.index' => 'Access',
            'admin.company.create' => 'Create',
            'admin.company.show' => 'Show',
            'admin.company.edit' => 'Edit',
            'admin.company.destroy' => 'Delete',
            'admin.company.set.permission' => 'Authorization'
        ]
    ],
    'role' => [
        'model' => 'Roles',
        'permissions' => [
            'admin.role.index' => 'Access',
            'admin.role.create' => 'Create',
            'admin.role.show' => 'Show',
            'admin.role.edit' => 'Edit',
            'admin.role.destroy' => 'Delete'
        ]
    ],

    'system' => [
        'model' => 'System',
        'permissions' => [
            'admin.system.edit' => 'Edit',
        ]
    ]
];
