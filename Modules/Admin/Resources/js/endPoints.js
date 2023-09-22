export default function (app) {
    const instance = app.endPointsInstance;
    return {
        auth: {
            login: () => instance.generateURL("POST", {}, "auth", "login"),
        },
        home: {
            index: () => instance.generateURL("GET", {}, "home"),
        },

    };
}
