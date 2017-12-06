import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { ProductPage } from './product';
import { TruncateModule } from 'ng2-truncate';

@NgModule({
  declarations: [
    ProductPage,
    TruncateModule
  ],
  imports: [
    IonicPageModule.forChild(ProductPage),
  ],
})
export class ProductPageModule {}
