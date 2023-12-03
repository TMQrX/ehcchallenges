# Tạ Minh Quân - CTV Ban Chuyên Môn - EHC Challenges

Đây sẽ là toàn bộ writeup về challenge *OverTheWire: Bandit* của EHC giao trong kì thử thách đối với cộng tác viên ban chuyên môn của CLB

![Alt text](img/image.png)

Sau khi đọc yêu cầu, mình đã tiến hành cài đặt Ubuntu 20.04 TLS trên vmware workstation 17

![Alt text](img/image-1.png)

# Level 1

![Alt text](img/image-2.png)

Đến với level đầu tiên, chúng ta được yêu cầu đọc file readme để lấy flag và flag chính là mật khẩu của challenges tiếp theo

Và chúng ta đã tìm thấy cờ sau khi đọc file readme bằng lệnh *cat*

![Alt text](img/image-3.png)

*FLAG : NH2SXQwcBdpmTEzi3bvBHMM9H66vVXjL*

# Level 2

![Alt text](img/image-4.png)

Ở level 2, chúng ta phải tìm được flag được dấu ở một file có tên là - ở home directory. Sử dụng flag bài trước đề login vào, vì đã biết chính xác tệp - nằm ở home directory nên mình  sẽ sử dụng lệnh *cat ./-* để đọc nội dung file -

![Alt text](img/image-5.png)

*FLAG : rRGizSaX8Mk1RTb1CNQoXTcYZWU6lgzi*

# Level 3

![Alt text](img/image-6.png)

Đến với level 3, họ yêu cầu chúng ta tìm flag ở trong một file, điều cần lưu ý ở bài này đó là file này có tên chứa các ký tự spaces. Và để xử lý bài này, chúng ta vẫn sử dụng lệnh cat nhưng cần đóng ngoặc kép.

```python
cat "file name"
```

![Alt text](img/image-7.png)

*FLAG : aBZ0W5EmUfAf7kHTQeOwd8bauFJ2lAiG*

# Level 4

![Alt text](img/image-8.png)

Ở chall này, đề bài yêu cầu mình tìm flag ở trong folder inhrere và file này đã bị ẩn đi. Vì vậy nếu chúng ta sử dụng lệnh *ls* thôi thì sẽ không tìm thấy file hidden này. Cho nên chúng ta sẽ sử dụng lệnh sau :

```python
ls -la 
```

![Alt text](img/image-9.png)

*FLAG : 2EW7BBsr6aMMoJ2HjW067dm8EgX26xNe*

# Level 5

![Alt text](img/image-10.png)

Bài này chúng ta cần tìm flag ở file trong inhere folder. Nhưng vấn đề là chỉ trong inhere có rất nhiều file khác nhau và trong chúng chỉ có một file chứa flag, còn lại đều là file chứa các ký tự không thể đọc được

Và để giải quyết nó, chúng ta có thể sử dụng lệnh *file* để xem định dạng file của các tệp này là gì

```python
file ./*
```

![Alt text](img/image-11.png)

Như bạn đã thấy, chỉ có duy nhất file07 là có định dạng mã ASCII text, vì thế nên chúng ta sẽ cat file07 để xem flag

![Alt text](img/image-12.png)

*FLAG : lrIWWI6bB37kxfiCQZqUdOIYfr6eEeqR*

# Level 6

![Alt text](img/image-13.png)

Ở bài này, chúng ta cần tìm mật khẩu ở một file trong folder inhere dựa trên các thông số như sau :

- human-reaadable
- 1033 byte in size
- not executable

Dựa vào những thông tin trên, mình có thể sử dụng lệnh find để tìm. Cụ thể như sau :
```
find -size 1033c
```

- Với -size là kích thước của file
- 1033c là số byte với c là đơn vị của byte

![Alt text](img/image-14.png)

Sau khi sử dụng lệnh find thì ta đã tìm ra flag ở folder maybehere07 nằm ở .file2

*FLAG : P4L4vucdmLnm8I7Vl7jG1ApGSfjYKqJU*

# Level 7

![Alt text](img/image-15.png)

Với các hint mà để bài cho, mình sử dụng ngay lệnh find dựa trên các thuộc tính bên dưới :

```
find / -user bandit7 -group bandit6 -size 33c 2>/dev/null
```

- Lưu ý nhỏ ở đây mình thêm 2>/dev/null bởi vì khi tìm ở thư mục gốc, họ để rất nhiều file có thông số như bên trên nhưng không cho mình quyền đọc, vì vậy mình chuyển hướng các file permission decined đó về null và chỉ trả lại file duy nhất có thể đọc được

![Alt text](img/image-16.png)

*FLAG : z7WtoNQU2XfjmMtWA8u5rN4vzqu4v99S*

# Level 8

![Alt text](img/image-17.png)

Bài này chúng ta cần tìm flag ở trong file data.txt, và hint ở đây đó chính là nó nằm kế tiếp từ *millionth*

Để giải quyết chúng ta có thể sử dụng lệnh grep để tìm :

```
cat data.txt | grep millionth
```

![Alt text](img/image-18.png)

*FLAG : TESKZC0XvTetK0S9xNwm25STk5iWrBvP*

# Level 9

![Alt text](img/image-19.png)

Bài này sau khi cat file data.txt, nó cho ra một đoạn chuỗi ký tự rất dài và lộn xộn, chính vì thế nên ta cần sử dụng kết hợp 2 lệnh :
```
sort data.txt | uniq -u
```

- sort có chức năng sắp xếp các dòng theo bảng chữ cái trong file data.txt
- uniq -u có chức năng hiển thị các dòng xuất hiện một dòng duy nhất 

![Alt text](img/image-20.png)

*FLAG : EN632PlfYiZbn3PhVK3XOGSlNInNE00t*

# Level 10

![Alt text](img/image-21.png)

Bài này cũng tương tự bài trước, chúng ta có thể dùng grep để tìm flag. Vấn đề ở đây chính là nếu dùng cat, chúng ta sẽ đọc được nội dung bên trong file data.txt. Nhưng ở đây file data.txt lại hiển thị dữ liệu dưới dạng nhị phân và grep thì không thể tìm được dữ liệu ở nhị phân. Vì vậy nên ta có thể dùng strings để đổi dữ liệu sang strings.

```
strings data.txt | grep "===="
```

![Alt text](img/image-22.png)

*FLAG : G7w8LIi6J3kTb8A7j9LgrywtEUlyyp6s*

# Level 11

![Alt text](img/image-23.png)

Với bài này, họ yêu cầu chúng ta phải giải mã flag nằm trong file data.txt dưới dạng base64. Chúng ta có thể sử dụng lệnh *base64* để decode đoạn mã này

```
base64 -d data.txt
```

![Alt text](img/image-24.png)

*FLAG : 6zPeziLdR2RKNdNYFNb6nVCKzphlXHBM*

# Level 12

![Alt text](img/image-25.png)

Ở bài này, đề bài yêu cầu tìm flag trong file data.txt, nhưng flag sẽ được mã hóa bằng ROT13. Nghĩa là các chữ cái từ a-z, A-Z sẽ được thay thế bằng các từ cách nó 13 đơn vị. Để giải quyết bài này, chúng ta có thể sử dụng lệnh *tr*

```
cat data.txt | tr abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ nopqrstuvwxyzabcdefghijklmNOPQRSTUVWXYZABCDEFGHIJKLM
```

![Alt text](img/image-26.png)

*FLAG : JVNBBFSmZwKKOP0XbFXOoW8chDz5yVRv*

# Level 13

![Alt text](img/image-27.png)

Đọc qua đề thì ta có thể thấy đây là một bài mà flag nằm trong các file zip và chúng ta cần phải tìm ra nó. Làm theo yêu cầu của đề bài, ta cp và mov file qua thư mục tmp

![Alt text](img/image-28.png)

Cat file ra thì thấy file ở dạng hex, chúng ta cần chuyển nó về dạng binary và dùng gzip để giải nén

![Alt text](img/image-29.png)

Cứ tiếp tục giải nén và file để xem định dạng file đến lần thứ 9. Chúng ta đã có flag

![Alt text](img/image-30.png)

*FLAG : wbWdlBxEir4CaE8LaPhauuOo6pwRmrDw*

# Level 14

![Alt text](img/image-31.png)

Chúng ta tiến hành kết nối SSH với sshkey.private

```
ssh -p 2220 -l bandit14 -i sshkey.private bandit.labs.overthewire.org 
```

Sau đó dựa vào đề bài nói flag nằm ở etc/bandit_pass/bandit14 nên ta sẽ cat file đó

![Alt text](img/image-32.png)

*FLAG : fGrHPx402xGC7U7rXKDaxiWFTOiF0ENq*

# Level 15

![Alt text](img/image-33.png)

Đề bài yêu cầu gửi mật khẩu ở trên cổng 30000. Chúng ta sẽ sử dụng lệnh *nc*

```
nc localhost 30000
```

![Alt text](img/image-34.png)

*FLAG : jN2kgmIXJ6fShzhT2avhotn4Zcka6tnt

# Level 16

![Alt text](img/image-36.png)

Ở bài này ta cần gửi mật khẩu tới cổng 30001 qua giao thức ssl. Ta sử dụng openssl để giải quyết

```
openssl s_client localhost:30001
```

![Alt text](img/image-35.png)

*FLAG : JQttfApK4SeyHwDlI9SXGR50qclOAil1*

# Level 17

![Alt text](img/image-37.png)

Cũng giống như bài trên nhưng port sẽ nằm trong khoảng từ 31000 - 32000 nên chúng ta sẽ dùng nmap để scan

```
nmap -sV -TS -p 31000-32000 localhost
```

Đợi một chút, chúng ta đã quét ra 2 cổng ssl

![Alt text](img/image-38.png)

Sử dụng openssl giống như bài trước và ta có file RSA encryption. Lưu nó lại thành file sshkey và sử dụng ssh để truy cập

![Alt text](img/image-39.png)

![Alt text](img/image-40.png)

*FLAG : VwOSWtCA7lRKkTfbr2IDh6awj9RNZM5e*

# Level 18

![Alt text](img2/image98.png)

Chúng ta cần tìm đoạn mã duy nhất không bị thay đổi trong 2 file password.old và password.new

Ta có thể sử dụng lệnh diff để tìm ra chúng

![Alt text](img/image-42.png)

*FLAG : hga5tuuCLF6fFzUpnagiMN8ssu9LFrdg*

# Level 19

![Alt text](img/image-43.png)

Sau khi đăng nhập bằng ssh, mình ngay lập tức bị disconnect ra. Vậy nên mình thử cat file khi đăng nhập vào thì có được flag

![Alt text](img/image-44.png)

*FLAG : awhqfNnAbc1naukrpqDYcF95h7HoMTrC*

# Level 20

![Alt text](img2/image97.png)

Đề bài yêu cầu chúng ta chạy file *bandit20-do* nhưng lưu ý ở đây là phải sử dụng setuid. Khi sử dụng setuid để thực thi file, chúng ta sẽ trở thành chủ sở hữu tạm thời của file đó

![Alt text](img/image-46.png)

*FLAG : VxCazJaVykI6W36BkBU0mJTCM8rR95XT*

# Level 21

![Alt text](img/image-47.png)

Đề bài yêu cầu  tạo kết nối với localhost trên cổng bạn Chỉ định làm đối số dòng lệnh. Sau đó, nó đọc một dòng văn bản từ kết nối và so sánh nó với mật khẩu ở cấp độ trước

Vậy nên mình sử dụng cổng 6969 và đẩy flag của bài trước lên. Sau đó dùng để so sánh nó với mật khaaurr mới

![Alt text](img/image-48.png)

*FLAG : NvEJF7oVjkddltPSrdKEFOllh9V1IBcq*

# Level 22

![Alt text](img/image-49.png)

Bài này mình spam cat theo hint của bài và ra được flag :)

![Alt text](img/image-50.png)

*FLAG : WdDozAdTM2z9DiFEQ2mGlwngMfj4EZff*

# Level 23

![Alt text](img/image-52.png)

Cũng tương tự như bài trên nhưng ta thay username bằng username bandit23 và sử dụng md5sum để decode

![Alt text](img/image-51.png)

*FLAG : 8ca319486bfbbc3663ea0fbe81326349*

# Level 24

![Alt text](img2/image-5.png)

Giống bài trước, thực hiện yêu cầu đề bài nên mình sẽ cd và cat file *cronjob_bandit24.sh* xem có gì

![Alt text](img2/image-1.png)

Sau đó bạn tiếp tục thực hiện theo yêu cầu là cat file đến directory trong bandit24.sh, và cấp quyền cho nó

![Alt text](img2/image-3.png)

![Alt text](img2/image-4.png)

*FLAG : VAfGXJ1PBSsPSnvsjI8p759leLZ9GGar*

# Level 25

![Alt text](img2/image-6.png)

Bài này ta sử dụng bruteforce để xử lý theo yêu cầu của đề bài, ta sử dụng vim và cấp quyền thực thi là có thể hoàn thành

Tạo một file bash trong tmp có nội dung như sau để tạo ra bruteforce

![Alt text](img2/image-7.png)

Cấp quyền chmod 777

![Alt text](img2/image-8.png)

Chạy file quan.sh

![Alt text](img2/image-9.png)

*FLAG : p7TaowMYrmu23Ol8hiZh9UvD0O9hpx8d*

# Level 26

![Alt text](img/image-53.png)

Đầu tiên bạn cần thu nhỏ terminal lại, sau đó truy cập login ssh bằng command bên dưới :

```
ssh -i bandit26.sshkey -p 2220 -l bandit26 bandit.labs.overthewire.org
```

Ấn v để chuyển sang vim sau đó nhập lệnh

```
:set shell =/bin/bash 
:shell
```

Dùng lệnh cat để đọc flag trong file text.txt

```
cat /etc/bandit_pass/bandit26
```
![Alt text](img2/image-10.png)

*FLAG : c7GvcKlw9mC7aUQaPx7nwFstuAIBw1o1*

# Level 27

![Alt text](img2/image-11.png)

Thu nhỏ terminal lại, tiếp theo sử login vào ssh và nhấn v để mở command của vim. Sau đó nhập : 
```
:set shell =/bin/bash 
:shell
```

Như vậy là ta đã đăng nhập ssh thành công. 

![Alt text](img/image-54.png)

*FLAG : YnQpBuifNMas1hcUFk70ZmqkhUU2EuaS*

# Level 28

![Alt text](img2/image-12.png)

Chúng ta sẽ được làm quen với lệnh git ở bài này. Ta git clone repo của bài yêu cầu về bằng lệnh : 
```
git clone ssh://bandit27-git@localhost:2220/home/bandit27-git/repo
```
![Alt text](img2/image-13.png)

Đọc file README trong repo

![Alt text](img2/image-14.png)

*FLAG : AVanL161y9rsbcJIsFHuw35rjaOM19nR*

# Level 29

![Alt text](img2/image-15.png)

Giống bài trước, tiếp tục git clone repo về và đọc file README

![Alt text](img2/image-16.png)

Có vẻ như không tìm thấy flag trong này, chúng ta hãy xem những commit của file này xem có sự thay đổi như nào bằng lệnh :
```python
git log
```

![Alt text](img2/image-17.png)

Ta cùng xem commit cuối cùng này bằng :

```
git show
```

![Alt text](img2/image-18.png)

*FLAG : tQKvmcwNYcFS6vmPHIUSI3ShmsrQZK8S*

# Level 30

![Alt text](img2/image-19.png)

Làm y hệt như các bước vừa rồi

![Alt text](img2/image-20.png)

Không có flag trong này, nên chúng ta hãy check xem các branch của nó có gì không bằng lệnh : 

```
git branch -a
```

Checkout hết nội dung folder dev bằng lệnh :

```
git checkout remotes/origin/dev
```

![Alt text](img2/image-21.png)

*FLAG : xbhV3HpNGlTIdnjUrdAlPzc2L6y9EOnS*

# Level 31

![Alt text](img2/image-22.png)

![Alt text](img2/image-23.png)

Chúng ta có thể dùng lệnh sau để xem chi tiết nhãn repo này :

```
git tag
```

![Alt text](img2/image-24.png)

*FLAG : OoffzGDlzhAlerFJ2cAiz1D41JW1Mhmt*

# Level 32

![Alt text](img2/image-25.png)

Đối với bài này ta cần sử dụng git push

![Alt text](img2/image-26.png)

git upload và git push thêm lần nữa ta được flag

![Alt text](img2/image-27.png)

*FLAG : rmCBvG56y58BXzv98yZGdO7ATVL5dW8y*

# Level 33

![Alt text](img2/image-28.png)

Bài này chúng ta có thể sử dụng $0 vì $0 biểu diễn cho một shell hay bắt đầu của một shell

![Alt text](img2/image-29.png)

*FLAG : odHo63fHiFqcWWJG9rLiLDtPm45KzUKy*

# Level 34

![Alt text](img2/image-30.png)

??? 404 Not Found

# Lời Kết

<details>
  <summary>Đừng nhấn</summary>
  
  Em yêu EHC <3
  
</details>
