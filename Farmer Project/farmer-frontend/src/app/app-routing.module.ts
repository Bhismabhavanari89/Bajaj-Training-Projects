import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AppComponent } from './app.component';
import { AboutComponent } from './about/about.component';
import { HomeComponent } from './home/home.component';
import { LoginComponent } from './login/login.component';
import { SignupComponent } from './signup/signup.component';
import { CropsComponent } from './crops/crops.component';
import { MachineriesComponent } from './machineries/machineries.component';
import { BuynowComponent } from './buynow/buynow.component';
import { LandingPageComponent } from './landing-page/landing-page.component';
import { CartComponent } from './cart/cart.component';
import { MyIssuesComponent } from './my-issues/my-issues.component';
import { AdminHomeComponent } from './admin/admin-home/admin-home.component';
import { AdminLoginComponent } from './admin/admin-login/admin-login.component';
import { AdminIssueComponent } from './admin/admin-issue/admin-issue.component';
import { AddProductComponent } from './admin/add-product/add-product.component';
import { UpdateProductComponent } from './admin/update-product/update-product.component';
import { ViewProductComponent } from './admin/view-product/view-product.component';
const routes: Routes = [
  {path:'',redirectTo:'landing',pathMatch:'full'},
  {path: 'admin',component: AdminLoginComponent},

  {path:'home',component: HomeComponent, children: [
    {path: '',component: CropsComponent},
    {path: 'machinery',component: MachineriesComponent}
  ]},
  {path:'admin-home',component: AdminHomeComponent,children: [
    {path: '',component: AdminIssueComponent},
    {path: 'add-products',component: AddProductComponent},
    {path: 'update-products/:product_id',component: UpdateProductComponent},
    {path: 'view-products',component: ViewProductComponent}
  ]},
  {path:'about',component: AboutComponent},
  {path:'login',component: LoginComponent},
  {path:'signup',component: SignupComponent},
  {path: 'buynow',component: BuynowComponent},
  {path: 'landing',component: LandingPageComponent},
  {path: 'cart',component: CartComponent},
  {path: 'myissues',component: MyIssuesComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
