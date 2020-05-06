import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'mypip'
})
export class MypipPipe implements PipeTransform {

  transform(value: any, searchTerm : any): any {
    if(value.lenth ===0 ){
      return value
    }
      return value.filter(function(search){
        return search.name.toLocaleLowerCase().indexOf(searchTerm.toLocaleLowerCase()) > - 1
      })
  }
  

}
// export class orderBy{
//   transform(array: Array<string>, args: string): Array<string> {
//     array.sort((a: any, b: any) => {
//       if (a < b) {
//         return -1;
//       } else if (a > b) {
//         return 1;
//       } else {
//         return 0;
//       }
//     });
//     return array;
//   } 
// }