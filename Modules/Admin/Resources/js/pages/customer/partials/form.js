const form = {
    config: {
        resource: "customer",
    },
    // 'name', 'mobile', 'password', 'email'
    inputs: [
        {
            component: "input",
            model: "name",
            label: "name",
            cols: 6,
            rules: {
                required: true
            },
        },
        {
            component: "input",
            model: "mobile",
            label: "mobile",
            cols: 6,
            rules: {
                required: true
            },
        },
        {
            component: "input",
            model: "email",
            label: "email",
            cols: 6,
            rules: {
                required: true
            },
        },
        {
            component: "input",
            model: "password",
            label: "password",
            cols: 6,
            rules: {
                required: true
            },
        },
    ]
};

export default form;
