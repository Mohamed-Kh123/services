export default function (app) {
    const instance = app.endPointsInstance;
    return {
        auth: {
            login: () => instance.generateURL("POST", {}, "auth", "login"),
        },
        home: {
            index: () => instance.generateURL("GET", {}, "home"),
        },
        constant: {
            index: () => instance.generateURL("GET", {}, "constant"),
        },
        category: instance.resource('category'),
        service: instance.resource('service'),
        company: instance.resource('company'),
        employee: instance.resource('employee'),
        select_group: instance.resource('select-group'),
        customer: instance.resource('customer'),
        slider: instance.resource('slider'),

        role: instance.resource("role", {
            permissions: () => instance.generateURL('GET', {}, 'role/get/permissions'),
        }),
        admins: instance.resource('admin')
    };
}
