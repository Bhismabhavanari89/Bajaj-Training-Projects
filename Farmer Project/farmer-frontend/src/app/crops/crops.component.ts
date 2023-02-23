import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { CardsService } from '../services/cards.service';

@Component({
  selector: 'app-crops',
  templateUrl: './crops.component.html',
  styleUrls: ['./crops.component.css'],
})
export class CropsComponent {
  crops: any;
  constructor(private cardsService: CardsService) {}

  ngOnInit() {
    this.cardsService.getCrops().subscribe((response: any) => {
      this.crops = response;
      this.crops.forEach((ele: any) => {
        ele.read_more = false;
      });
    });
  }

  readMore(index: any) {
    this.crops[index].read_more = !this.crops[index].read_more;
  }
}
