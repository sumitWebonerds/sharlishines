import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { HttpModule } from '@angular/http';
import { SocialSharing } from '@ionic-native/social-sharing';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home'; 
import { ListPage } from '../pages/list/list';
import { ProductPage } from '../pages/product/product';
import { CartPage } from '../pages/cart/cart';

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { ServicesProvider } from '../providers/services/services';
import { IonicStorageModule } from '@ionic/storage';
import { SocialsharingProvider } from '../providers/socialsharing/socialsharing';
import { ToastProvider } from '../providers/toast/toast';
import { WishlistPage } from '../pages/wishlist/wishlist';
import { TruncateModule } from 'ng2-truncate';
import { CartCountComponent }  from '../components/cart-count/cart-count'

@NgModule({
  declarations: [
    MyApp,
    HomePage,
    ListPage,
    ProductPage,
    CartPage,
    WishlistPage,
    CartCountComponent,
  ],
  imports: [
    BrowserModule,
    HttpModule,
    TruncateModule,
    IonicModule.forRoot(MyApp),
     IonicStorageModule.forRoot(),
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    ListPage,
    ProductPage,
    CartPage,
    WishlistPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    ServicesProvider,
    SocialsharingProvider,
    ToastProvider,
    SocialSharing,
  ]
})
export class AppModule {}
