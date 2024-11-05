/*
    課題：
    - 以下のコメントに従いコードを記述してください！
    - 課題が出来次第、保存して、このファイルを提出してください。
    dockerのlesoon5-phpコンテナを起動　→　DBeaver　実行して結果を確認
*/


 /*
  1.  Booksテーブルから、titleカラムの文字に「進撃」が含まれるレコードを取得するSQL
  2.  Booksテーブルから、authorカラムがNULLであるレコードを取得するSQL
  3.  Booksテーブルから、PublicationYearカラムが1997以上のレコードを、PublicationYearが高い順に、最大取得件数が２件になるよう取得するSQL。
*/
1.SELECT * FROM Books WHERE Title LIKE '%進撃%';
2.SELECT * FROM Books WHERE AUthor is NULL ;
3.SELECT * FROM Books WHERE PublicationYear >= 1997 ORDER BY PublicationYear DESC LIMIT 2 ;