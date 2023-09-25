export default function (app) {
    const instance = app.endPointsInstance;
    return {
        auth: {
            login: () => instance.generateURL("POST", {}, "auth", "login"),
        },
        home: {
            index: () => instance.generateURL("GET", {}, "home"),
        },

        category: instance.resource('category'),
        service: instance.resource('service'),
    };
}
