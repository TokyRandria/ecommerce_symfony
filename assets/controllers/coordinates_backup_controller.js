import { Controller } from '@hotwired/stimulus';
/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */

export default class extends Controller {
    static targets = ["placeholder"]

    connect() {
        console.log("hello stimulus map");
        import("leaflet").then(L => {
            this.map = L.map(this.placeholderTarget, {zoomDelta: 0.5, zoomSnap: 0.5}).setView([50.1960, -6.8712], 10);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(this.map);
        });
    }

    disconnect() {
        this.map.remove()
    }
}