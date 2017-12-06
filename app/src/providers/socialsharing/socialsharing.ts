import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { SocialSharing } from '@ionic-native/social-sharing';

import 'rxjs/add/operator/map';

@Injectable()
export class SocialsharingProvider {

  constructor(public http: Http,public socialSharing: SocialSharing) {
    console.log('Hello SocialsharingProvider Provider');
  }
  public shareOnSocial(message, image, url){
    this.socialSharing.share(message, '' , image, url).then(() => {
   }).catch(() => {
   
   });
  }

}
