import { Component } from '@angular/core';

/**
 * Generated class for the CartCountComponent component.
 *
 * See https://angular.io/api/core/Component for more info on Angular
 * Components.
 */
@Component({
  selector: 'cart-count',
  templateUrl: 'cart-count.html'
})
export class CartCountComponent {

  text: string;

  constructor() {
    console.log('Hello CartCountComponent Component');
    this.text = 'Hello World';
  }

}
