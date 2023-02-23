import { Component } from '@angular/core';
import { User1 } from '../user.interface';
import { User2 } from '../user.interface';
import { UserserviceService } from '../userservice.service';
import {
  FormBuilder,
  FormControl,
  Validators,
  FormGroup,
  NgForm,
} from '@angular/forms';
import { Router } from '@angular/router';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
})
export class LoginComponent {
  public user1!: User1; // our model

  constructor(
    private userserviceService: UserserviceService,
    private router: Router
  ) {}
  onSubmit(f: any) {
    let userData = f.value;
    this.userserviceService.login(userData).subscribe((response: any) => {
      // console .log(response);
      localStorage.setItem('login_details', JSON.stringify(response));
      //

      this.router.navigateByUrl('/home');
    });
  }

  ngOnInit() {
    // we will initialize our form here
    this.user1 = {
      email: '',
      password: '',
    };
  }
}
