#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main () {
    
    int a = 9, b = 81, am = 0, itdiv = 0;
    for (int a = 9; a < b; a++) {
        if (a % 9 == 0) {
            am++;
            
            if (a % 3 == 0) {
                itdiv++;
            }
        }
        
    }
    
    printf("am: %d\nitdiv: %d\n", am, itdiv);
    
    // int X = 62;
    // int hour = X / 3600;
    // int minute = (X % 3600) / 60;

    // int second = (X % 60);
    
    // printf("Hour: %d\nMin: %d\nSec: %d\n", hour, minute, second);
    
    // int X = 12345;
    // int hour = X / 3600;
    // X = X - (hour * 3600);

    // int minute = X / 60;

    // X = X - (minute * 60);

    // int second = X;
    
    // printf("Hour: %d\nMin: %d\nSec: %d\n", hour, minute, second);
    
    // int a = 1, b = 2, c = 3;
    // int count = 0;
    
    // do {
    //     c = b + 1;
    //     b = a + 1;
    //     a = c + 1;
        
    //     count += 1;
    // } while (a <= 7 || b <= 7 || c <= 7);
    
    // printf("%d\n", count);
    
    // int n = 1;
    // while (n <= 20) {
    //     if (n%2==0 && n % 3 == 0 || n%10 == 0) {
    //         printf("BINUS\n");
    //     }
    //     n += 1;
    // }
    
    // int z = 0, p = 2, q = 3, r = 4, x = 4, y = 6, w = 8;
    // z = p * r % q + w / x - y;
    
    // printf("%d", z);
    
    // int x = 123;
    // printf("nilai x adalah: %x", x);
    
    return 0;
}