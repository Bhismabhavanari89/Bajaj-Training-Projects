import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { CardsService } from '../services/cards.service';

@Component({
  selector: 'app-machineries',
  templateUrl: './machineries.component.html',
  styleUrls: ['./machineries.component.css'],
})
export class MachineriesComponent {
  machines: any;
  constructor(private cardsService: CardsService) {}

  ngOnInit() {
    this.cardsService.getMachines().subscribe((response: any) => {
      this.machines = response;
      this.machines.forEach((ele: any) => {
        ele.read_more = false;
      });
    });
  }

  readMore(index: any) {
    this.machines[index].read_more = !this.machines[index].read_more;
  }
}
