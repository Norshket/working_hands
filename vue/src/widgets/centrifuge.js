import {Centrifuge} from "centrifuge";
import store from "@/store";

const centrifuge = new Centrifuge("ws://173.20.0.9:8000/connection/websocket", {
    token: store.getters["auth/centrifugeToken"]
});

centrifuge.connect();

export default centrifuge
