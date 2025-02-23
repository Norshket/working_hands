import centrifuge from "@/widgets/centrifuge";
import store from "@/store";

centrifuge.newSubscription('auth_user')
    .on('publication', function (ctx) {
        store.commit('auth/changeAuth', ctx)
        console.log(ctx.data);
    }).subscribe();
