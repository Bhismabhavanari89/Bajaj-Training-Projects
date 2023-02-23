import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { CardsService } from 'src/app/services/cards.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-update-product',
  templateUrl: './update-product.component.html',
  styleUrls: ['./update-product.component.css'],
})
export class UpdateProductComponent {
  categorylist: any;
  update_product_details: any;
  originalData: any;
  product_id: any;

  constructor(
    private route: ActivatedRoute,
    private cardsService: CardsService,
    public router: Router
  ) {}

  updateProduct(id: number, data: any) {
    if (data.name === '') {
      data.name = this.originalData.name;
    }
    if (data.price === '') {
      data.price = this.originalData.price;
    } 
    if (data.description === '') {
      data.description = this.originalData.description;
    }
    if (data.image === '') {
      data.image = this.originalData.image;
    }
    if (data.cid === '') {
      data.cid = this.originalData.cid;
    }

    this.cardsService.updateProduct(id, data).subscribe((response: any) => {
      if (response.success === true) {
        this.router.navigate(['/admin-home/view-products']);
      }
    });
  }
  ngOnInit(): void {
    let a = localStorage.getItem('admin_key');
    if (a !== '#43f') {
      // alert('please sign in as admin to access this section');
      this.router.navigate(['/admin']);
    }
    this.product_id = this.route.snapshot.paramMap.get('product_id');
    this.cardsService.getProduct(this.product_id).subscribe((response: any) => {
      this.update_product_details = response;
      //
      this.originalData = {
        name: response.name,
        price: response.price,
        image: response.image,
        description: response.description,
        cid: response.cid,
      };
    });

    this.cardsService.getCategory().subscribe((response: any) => {
      this.categorylist = response;
    });
  }
}
