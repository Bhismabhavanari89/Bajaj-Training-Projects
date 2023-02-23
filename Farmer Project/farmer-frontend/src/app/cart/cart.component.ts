import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { CardsService } from '../services/cards.service';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css'],
})
export class CartComponent {
  cart: any;
  totalAmount: number = 0;

  constructor(private cardsService: CardsService, public router: Router) {}
  user = JSON.parse(localStorage.getItem('login_details') || '{}');
  ngOnInit(): void {
    if (!this.user.token) {
      this.router.navigate(['/login']);
    }
    this.cardsService
      .getCartProducts(this.user.user.id)
      .subscribe((response) => {
        this.cart = response;

        for (let i = 0; i < this.cart.length; i++) {
          this.totalAmount += this.cart[i].pivot.amount;
        }
      });
  }

  updateCart(index: number, sign: string) {
    if (sign === 'plus') {
      this.cart[index].pivot.quantity += 1;
      this.totalAmount += this.cart[index].price;
    } else {
      this.cart[index].pivot.quantity -= 1;
      this.totalAmount -= this.cart[index].price;
    }

    this.cart[index].pivot.amount =
      this.cart[index].pivot.quantity * this.cart[index].price;

    let body = {
      quantity: this.cart[index].pivot.quantity,
      amount: this.cart[index].pivot.amount,
    };

    if (this.cart[index].pivot.quantity > 0) {
      this.cardsService
        .updateCart(body, this.cart[index].pivot.id)
        .subscribe((response) => {});
    } else {
      this.cardsService
        .removeFromCart(
          this.cart[index].pivot.user_id,
          this.cart[index].pivot.product_id
        )
        .subscribe((response: any) => {
          if (response.success === true) {
            this.cart = response.cart;
            // this.totalAmount=0;
          }
        });
    }
  }
}
