const form = {
    config: {
        resource: "section",
    },

    inputs: [
        {
            component: "input",
            model: "name",
            label: "name",
            rules: {
                required: true
            },
            multiLang: true,
        },
        {
            component: "select",
            model: "type",
            label: "type",
            option_value: "value",
            cols: 6,
            endPoint: {name: 'constant.index', params: {no_pagination: true, key: 'sections_types'}},
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
        // 'title', 'text', 'image', 'section_id', 'is_active'
        {
            component: "crud",
            label: "blogs",
            model: "blogs",
            slug: "section_blog",
            show: function () {
                return this?.form?.type === 'blog_section';
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
            ],
            inputs: [
                {
                    component: "input",
                    model: "title",
                    label: "title",
                    multiLang: true,
                    rules: {
                        required: true
                    },
                },
                {
                    component: "textarea",
                    model: "text",
                    label: "text",
                    multiLang: true,
                    rules: {
                        required: true
                    },
                },
                {
                    component: "image",
                    model: "image",
                    label: "image",
                    image_url_option: "image_url",
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
            ],

        },
        {
            component: "file",
            model: "images",
            crop: true,
            width: 500,
            label: "album",
            ratio: 16 / 9,
            endPoint: {name: "image.upload_album", params: {no_pagination: true}},
            show: function () {
                return this?.form?.type === 'slider_section';
            },
        },




    ]
};

export default form;