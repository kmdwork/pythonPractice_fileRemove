import os
import re

# === 設定 ===
TARGET_FOLDER = "blade_files"  # Bladeファイルが入っているフォルダ
LOG_FILE = "deleted_log.txt" 

def clean_blade_files(folder):
    log_entries = []
    
    for filename in os.listdir(folder):
        if filename.endswith(".blade.php"):
            file_path = os.path.join(folder, filename)

            with open(file_path, "r", encoding="utf-8") as file:
                content = file.read()

            # <body> と </body> タグの間のコンテンツのみを対象にする
            body_content = re.search(r"<body.*?>(.*?)</body>", content, re.DOTALL)

            if body_content:
                body_start_index = content.find(body_content.group(0))
                body_start_line = content[:body_start_index].count('\n') + 1
                # body_start_index = body_content.start()  # <body> タグの開始位置
                body_content = body_content.group(1)  # <body> と </body> の間の内容を取得

                #ーーーーーーー 処理１　`{{ ... }}` で囲まれた部分を探す　ーーーーーーーー
                matches = re.finditer(r"{{.*?}}", body_content, re.DOTALL)

                # 削除対象がある場合のみ処理
                # if matches:
                log_entries.append(f"=== {filename} ===  {body_start_line}")
                # log_entries.append(f"Before:\n{body_content}")  編集前ビュー
                original_body_lines = body_content.splitlines()  # `<body>` 内の行を分割

                for match in matches:
                    # match_start_line = body_content.find(match.group(0))  # マッチした部分の開始位置
                    # match_end_line = match_start_line + len(match.group(0))  # マッチ部分の終了位置

                    # 行番号を記録 (開始行)
                    match_start_line_number = body_content[:match.start()].count('\n') + body_start_line
                    # match_end_line_number = body_content[:match_end_line].count('\n') + body_start_line
                    # deleted_lines_info.append(f"削除: {match} (行番号: {match_start_line_number})")
                    # log_entries.append(f"行番号: {match_start_line_number}-{match_end_line_number}行目|| 削除: {match.group(0)}")
                    log_entries.append(f"行番号: {match_start_line_number}行目|| 削除: {match.group(0)}")


                matches = re.finditer(r"{{.*?}}", body_content, re.DOTALL)
                for match in matches:
                    body_content = body_content.replace(match.group(0), "")  # 該当部分を削除
                # 同じ繰り返し内では正しく行数が記入されない



                #ーーーーーーー 処理２　`@php ... @endphp` で囲まれた部分を探す　ーーーーーーーー
                body_content = re.sub(
                    r"@php.*?@endphp", 
                    "",
                    body_content, flags=re.DOTALL
                )


                #ーーーーーーー 処理3　@を含む行を{{-- ... --}}で囲む　ーーーーーーーー
                body_content = re.sub(
                    r"^(.*@.*)$", 
                    lambda x: "{{-- " + x.group(1) + " --}}",
                    body_content, flags=re.MULTILINE
                )


                # <body> タグ内の内容が変更された後、元の content に戻す
                content = content.replace(content.split("<body>")[1].split("</body>")[0], body_content)


                # 削除後の内容を保存
                with open(file_path, "w", encoding="utf-8") as file:
                    file.write(content)

                # log_entries.append(f"After:\n{body_content}\n")　編集後ビュー
                print(f"✅ 修正済み: {filename}")
                # else:
                #     print(f"✨ {filename} はの削除対象がありませんでした。")

            
            else:
                print(f"✨ {filename} に<body>タグがありませんでした。")
    
    # 削除ログを保存
    if log_entries:
        with open(LOG_FILE, "w", encoding="utf-8") as log_file:
            log_file.write("\n".join(log_entries))
        print(f"📜 ログを {LOG_FILE} に保存しました。")
    else:
        print("✨ 削除対象はありませんでした。")# 実行


clean_blade_files(TARGET_FOLDER)
print("🎯 すべての Blade ファイルのクリーニング完了！")