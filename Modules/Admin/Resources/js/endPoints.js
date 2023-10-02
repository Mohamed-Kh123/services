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
        select_group: instance.resource('select-group'),
    };
}
