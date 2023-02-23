import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { CardsService } from 'src/app/services/cards.service';

@Component({
  selector: 'app-view-product',
  templateUrl: './view-product.component.html',
  styleUrls: ['./view-product.component.css'],
})
export class ViewProductComponent {
  products: any;
  constructor(private cardsService: CardsService, public router: Router) {}

  ngOnInit() {
    let a = localStorage.getItem('admin_key');
    if (a !== '#43f') {
      this.router.navigate(['/admin']);
    }
    localStorage.removeItem('product_id');
    this.cardsService.getAllProducts().subscribe((response: any) => {
      this.products = response;
      //
    });
  }

  updateProduct(product_id: any) {
    localStorage.setItem('product_id', product_id);

    // this.router.navigate(['/admin-home/update-products']);
  }
}
