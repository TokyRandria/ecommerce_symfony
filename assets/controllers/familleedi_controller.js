import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    count = 0;
    static targets =['famille'];
        ajout(){
            const nom = this.familleTargets[0].value;
            console.log(nom);
        }
}