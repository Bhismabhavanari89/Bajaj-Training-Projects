import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavbarComponent } from './navbar/navbar.component';
import { FooterComponent } from './footer/footer.component';
import { TrialComponent } from './trial/trial.component';
import { CropsComponent } from './crops/crops.component';
import { AboutComponent } from './about/about.component';
import { HomeComponent } from './home/home.component';
import { GrievancesComponent } from './grievances/grievances.component';
import { LoginComponent } from './login/login.component';
import { SignupComponent } from './signup/signup.component';
import { SchemesComponent } from './schemes/schemes.component';
import { FormsModule, FormBuilder, ReactiveFormsModule } from '@angular/forms';
import { TopNavComponent } from './top-nav/top-nav.component';
import { MachineriesComponent } from './machineries/machineries.component';
import { FertilizersComponent } from './fertilizers/fertilizers.component';
import { BuynowComponent } from './buynow/buynow.component';
import { CartComponent } from './cart/cart.component';
import { LandingPageComponent } from './landing-page/landing-page.component';
import { MyIssuesComponent } from './my-issues/my-issues.component';
import { AdminHomeComponent } from './admin/admin-home/admin-home.component';
import { AdminTopNavComponent } from './admin/admin-top-nav/admin-top-nav.component';
import { AdminLoginComponent } from './admin/admin-login/admin-login.component';
import { AdminIssueComponent } from './admin/admin-issue/admin-issue.component';
import { AddProductComponent } from './admin/add-product/add-product.component';
import { ViewProductComponent } from './admin/view-product/view-product.component';
import { UpdateProductComponent } from './admin/update-product/update-product.component';
@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    FooterComponent,
    TrialComponent,
    CropsComponent,
    AboutComponent,
    HomeComponent,
    GrievancesComponent,
    LoginComponent,
    SignupComponent,
    SchemesComponent,
    TopNavComponent,
    MachineriesComponent,
    FertilizersComponent,
    BuynowComponent,
    CartComponent,
    LandingPageComponent,
    MyIssuesComponent,
    AdminHomeComponent,
    AdminTopNavComponent,
    AdminLoginComponent,
    AdminIssueComponent,
    AddProductComponent,
    ViewProductComponent,
    UpdateProductComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
