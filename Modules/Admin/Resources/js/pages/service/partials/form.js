const form = {
    config: {
        resource: "service",
    },

    inputs: [
        {
            component: "input",
            model: "name",
            label: "name",
            cols: 12,
            rules: {
                required: true
            },
            multiLang: true,
        },
        {
            component: "editor",
            model: "description",
            label: "description",
            cols: 12,
            rules: {
                required: true
            },
            multiLang: true,
        },
        {
            component: "select",
            model: "category_id",
            label: "category_name",
            cols: 6,
            endPoint: {name: 'category.index', params: {no_pagination: true, activated: true}},
            rules: {
                required: true
            },
        },
        // {
        //     component: "input",
        //     model: "price",
        //     label: "price",
        //     cols: 6,
        //     rules: {
        //         required: true
        //     },
        // },

        {
            component: "select",
            model: "order_determine_types",
            label: "order_determine_types",
            option_value: "value",
            cols: 6,
            endPoint: {name: 'constant.index', params: {no_pagination: true, key: 'order_determine_types'}},
            rules: {
                required: true
            },
        },
        {
            component: "input",
            model: "min_price",
            label: "min_price",
            cols: 6,
            rules: {
                required: true
            },
        },
        {
            component: "switch",
            model: "is_active",
            cols: 6,
            label: "is_active",
        },
        {
            component: "image",
            model: "image",
            label: "image",
            image_url_option: "image_url",
            cols: 6,
        },
        {
            component: "repeater",
            label: "counter_fields",
            model: "counter_fields",
            show: function () {
                return this?.form?.order_determine_types === 'counter_fields';
            },
            inputs: [
                {
                    component: "input",
                    model: "label",
                    label: "label",
                    cols: 6,
                },
                {
                    component: "input",
                    model: "unit_price",
                    label: "unit_price",
                    cols: 6,
                },
            ],
        },
        {
            component: "crud",
            label: "select_group",
            model: "select_group",
            slug: "select_group",
            show: function () {
                return this?.form?.order_determine_types === 'select_group';
            },
            columns: [
                {
                    label: "id",
                    value: "id"
                },
                {
                    label: "title",
                    value: "title"
                },
                {
                    label: "description",
                    value: "description"
                },
            ],
            inputs: [
                {
                    component: "input",
                    model: "title",
                    label: "title",
                    cols: 6,
                    rules: {
                        required: true
                    },
                    multiLang: true,
                },
                {
                    component: "input",
                    model: "description",
                    label: "description",
                    cols: 6,
                    rules: {
                        required: true
                    },
                    multiLang: true,
                },
                {
                    component: "repeater",
                    label: "group_options",
                    model: "group_options",
                    inputs: [
                        {
                            component: "input",
                            model: "label",
                            label: "label",
                            cols: 6,
                        },
                        {
                            component: "input",
                            model: "unit_price",
                            label: "unit_price",
                            cols: 6,
                        },
                    ],
                },
            ],

        },

    ]
};

export default form;
