import centrifuge from "@/widgets/centrifuge";
import store from "@/store";


centrifuge.newSubscription('auth_user_'+store.getters["auth/id"])
    .on('publication', function ({data}) {
        store.commit('auth/changeAuth', data)
    }).subscribe();
