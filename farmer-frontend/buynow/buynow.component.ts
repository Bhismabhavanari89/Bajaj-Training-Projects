import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { CardsService } from '../services/cards.service';
@Component({
  selector: 'app-buynow',
  templateUrl: './buynow.component.html',
  styleUrls: ['./buynow.component.css'],
})
export class BuynowComponent {
  products: any;
  cart: any;

  constructor(private cardsService: CardsService, public router: Router) {}
  user = JSON.parse(localStorage.getItem('login_details') || '{}');

  ngOnInit(): void {
    if (this.user.token) {
      this.cardsService.getProducts().subscribe((response: any) => {
        this.products = response.products;
        this.cart = response.cart;
      });
    } else {
      this.cardsService.getAllProducts().subscribe((response: any) => {
        this.products = response;
      });
    }
  }

  checkInCart(product: any) {
    //
    //
    if (this.user.token) {
      let cp = this.cart.find((p: any) => {
        return (
          p.pivot.user_id === this.user.user.id &&
          p.pivot.product_id === product.id
        );
      });

      if (cp === undefined) {
        return false;
      }

      return true;
    }
    return false;
  }

  addToCart(product: any) {
    if (!this.user.token) {
      // alert('Please login to access add product');
      this.router.navigate(['/login']);
    }

    let item = {
      user_id: this.user.user.id,
      product_id: product.id,
      amount: product.price,
    };

    //

    this.cardsService.addToCart(item).subscribe((response: any) => {
      if (response.success === true) {
        this.cart = response.cart;
      }
    });
  }

  removeFromCart(productid: any) {
    this.cardsService
      .removeFromCart(this.user.user.id, productid)
      .subscribe((response: any) => {
        if (response.success === true) {
          this.cart = response.cart;
        }
      });
  }
}
