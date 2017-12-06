import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { ServicesProvider } from '../../providers/services/services';
import { ListPage } from '../list/list';
import { LoadingController } from 'ionic-angular';
import { localglobal } from "../localglobal";
import { TruncateModule } from 'ng2-truncate';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html',
  providers: [ ServicesProvider ],
})



export class HomePage {
  public categoryList;
  public slidersList;
  public IMG_URL;
  public url;
  constructor(public navCtrl: NavController,public service: ServicesProvider,public loadingCtrl: LoadingController) {
    this.navCtrl = navCtrl;
    this.categoryList = [];
    this.slidersList = [];
    this.url = localglobal.url;
    this.IMG_URL = localglobal.IMG_URL;
    this.loadCategories(this.url);
    this.loadSliders(this.url);
  }
  
  loadCategories(this,url){
    let loader = this.loadingCtrl.create({
      content: "Please wait...",
      duration: 3000
    });
   loader.present();
   this.service.loadCategoriesList(url)
   .then(data => {
        loader.dismiss();
        this.categoryList = data.data;
    });
  }

   loadSliders(this,url){
    let loader = this.loadingCtrl.create({
      content: "Please wait...",
      duration: 3000
    });
    loader.present();
    this.service.loadSlidersList(url)
    .then(data => {
        loader.dismiss();
        this.slidersList = data.data;
    });
   }


  open(event, category) {
    this.navCtrl.push(ListPage,{
      category:category.id
    });
  }

  ionViewDidLoad(){
    console.log('loaded');
  }
  

}
