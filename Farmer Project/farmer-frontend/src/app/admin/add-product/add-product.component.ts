import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { CardsService } from 'src/app/services/cards.service';

@Component({
  selector: 'app-add-product',
  templateUrl: './add-product.component.html',
  styleUrls: ['./add-product.component.css'],
})
export class AddProductComponent {
  constructor(private cardsService: CardsService, public router: Router) {}
  updatepro: any;
  // CardsService: any;
  errors: any;
  categorylist: any;
  addProduct(data: any) {
    this.cardsService.addProduct(data).subscribe((response: any) => {
      if (response.success === true) {
        this.router.navigate(['/admin-home/view-products']);
      }
    });
  }
  ngOnInit(): void {
    let a = localStorage.getItem('admin_key');
    if (a !== '#43f') {
      this.router.navigate(['/admin']);
    }
    this.cardsService.getCategory().subscribe((response: any) => {
      this.categorylist = response;
    });
  }
}
